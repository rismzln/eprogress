<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ImageController extends Controller
{
    public function show ($mykid,$id)
    {
        // get the current Images
        $image = Image::find($id);

        // get previous user id
        $previous = Image::latest('datePost')->where('id', '<', $id)->where('mykid','=',$mykid)->get();

        // get next user id
        $next = Image::where('id', '>', $id)->where('mykid','=',$mykid)->get();

            // $images = Image::where('mykid','=',$mykid)->orWhere('id','=',$id)->paginate(1);

        if ($next->isEmpty()&&$previous->isEmpty())
        {
            return view ('images',[
                'image'=> $image,
                'mykid'=> $mykid,
                'id' => $id,
                'next' => 'no',
                'prev' => 'no'
            ]);
        }
        elseif($previous->isEmpty())
        {
            return view ('images',[
                'image'=> $image,
                'mykid'=> $mykid,
                'id' => $id,
                'next' => $next[0]->id,
                'prev' => 'no'
            ]);
        }
        elseif ($next->isEmpty())
        {
            return view ('images',[
                'image'=> $image,
                'mykid'=> $mykid,
                'id' => $id,
                'next' => 'no',
                'prev' => $previous[0]->id
            ]);
        }
            // dd($image->id, $previous[0]->id , $next);

            return view ('images',[
                'image'=> $image,
                'mykid'=> $mykid,
                'id' => $id,
                'prev' => $previous[0]->id,
                'next' => $next[0]->id,
            ]);
    }

    public function destroy()
    {
        dd('delete');
    }
}
