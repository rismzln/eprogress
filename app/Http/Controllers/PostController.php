<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Patient;
use App\Models\Post;
use App\Models\Image;
use Carbon\Carbon;
use DateTime;



class PostController extends Controller
{
    public function index()
    {
    }
    public function store (Request $request, Patient  $patient)
    {
        $this->validate($request,[
            'body' => 'required',
            'datePost' => 'required'
            ]);

        $post = new Post();
        $post->mykid = $patient->mykid ;
        $post->body = $request->body;
        $post->datePost = $request->datePost;
        $post->stamp = auth()->user()->username;
        // dd($post);
        $post->save();


        $images = $request->image;
        if (!$images==null)
        {
            foreach ($images as $image){
            $ori = $image->getClientOriginalName();
            $image_new_name = time() . substr ($ori, -10) ;
            $image->move('images' , $image_new_name);
            $ext = pathinfo(storage_path($ori), PATHINFO_EXTENSION);
            // dd($image_new_name);


            // dd($ext);
            $imgsave = new Image;
            $imgsave->mykid = $patient->mykid ;
            $imgsave->post_id = $post->id;
            $imgsave->image = 'images/' . $image_new_name ;
            $imgsave->extension = strtolower($ext);
            $imgsave->datePost = $request->datePost;
            $imgsave->save();
            }
        }
        return redirect()->back()->with('post', 'Post Successful');
    }

    public function update($mykid, $id ,Request $request)
    {
        // dd($mykid, $id);
        $post = Post::where('id' ,'=', $id)->update([
            'datePost' => $request->datePost,
            'body' => $request->body,
            ]);

        $images = $request->image;

        foreach ($images as $image){
            $ori = $image->getClientOriginalName();
            $image_new_name = time() . substr ($ori, -10) ;
            $image->move('images' , $image_new_name);
            $ext = pathinfo(storage_path($ori), PATHINFO_EXTENSION);
            // dd($image_new_name);


            // dd($ext);
            $imgsave = new Image;
            $imgsave->mykid = $mykid ;
            $imgsave->post_id = $id;
            $imgsave->image = 'images/' . $image_new_name ;
            $imgsave->extension = strtolower($ext);
            $imgsave->datePost = $request->datePost;
            $imgsave->save();
        }
        return back();

    }

    public function destroy($mykid , $id)
    {
        $post = Post::find($id);
        $images = Image::where('post_id', '=', $id)->get();

        foreach($images as $image){
            Storage::delete($image->image);
            $image->delete();

            $image_path = $image->image;  // Value is not URL but directory file path
            if(File::exists($image_path))
                {
                File::delete($image_path);
                }
        }
        $post->delete();

        return redirect()->back()->with('delete', 'Post deleted');
    }
}
