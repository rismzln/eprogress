<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Post;
use Brick\Math\BigInteger;
use Illuminate\Support\Facades\Storage;



class PatientProfileController extends Controller
{
    public function index (Patient  $patient)
    {
        $posts = Post::where('mykid','=', $patient->mykid)->latest('datePost')->paginate(7);
        $images = Image::where('mykid','=', $patient->mykid)->get();
        // $image = Image::first();
        // $url = Storage::url($image->image);
        // $fileName = substr(, -4);
        // $extension = pathinfo(storage_path($image->image), PATHINFO_EXTENSION);




        // dd($extension);
        return view('profilepatient/profilePatient',[
            'patient'=> $patient,
            'posts' => $posts,
            'images' => $images,
            ]);

    }

    public function edit(Patient $patient )
    {
        $posts = Post::where('mykid','=', $patient->mykid)->latest('datePost')->paginate(7);
        $images = Image::where('mykid','=', $patient->mykid)->latest('datePost')->get();

        return view('profilepatient/editProfilePatient',[
            'patient'=> $patient,
            'posts' => $posts,
            'images' => $images,
            ]);
    }

    public function update(Request $request, $oldId)
    {
        // $this->validate($request,[
        //     'patientName' => 'required',
        //     'mykid' => 'required',
        //     'programType' => 'required',
        //     'age' => 'required',
        //     'gender' => 'required',
        //     'dob' => 'required',
        //     'oku' => 'required',
        //     'school' => 'required',
        //     'branch' => 'required'
        //     ]);

        $id = $request->mykid;
        $image = $request->profilePicture;

        if(!$image==null)
        {
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move('profilePicture' , $image_new_name);
            $patient = Patient::where('mykid' ,'=', $oldId)->update([
            'profilePicture' => 'profilePicture/'.$image_new_name ,
            ]);

        }

        $patient = Patient::where('mykid' ,'=', $oldId)->update([
            'mykid' => $id,
            'patientName' => $request->name,
            // 'parentID' => $request->mykid,
            'programType' => $request->programType,
            'gender' => $request->gender,
            'age' => $request->age,
            'dob' => $request->dob,
            'oku' => $request->oku,
            'school' => $request->school,
            'branch' => $request->branch,
            ]);

            // dd($image);

            return redirect()->route('patient.profile',$id);
        }
}
