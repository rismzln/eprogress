<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use function Symfony\Component\VarDumper\Dumper\esc;

class PatientController extends Controller
{
    public function index ()
    {
        $search = request()->query('search');
        $branch = request()->query('branch');

        if(auth()->user()->user_type=='user')
        {
            // dd(auth()->user()->parentID);
            $patientParent = Patient::where('parentID','=',auth()->user()->parentID)->get();
            // dd($patientParent);
            return view('patients',['patients'=>$patientParent]);

        }

        elseif ($search)
        {

            $ivtPatients = Patient::where('patientName','LIKE',"%{$search}%")->where('branch','=',$branch)->where('programType','=','IVT')->simplePaginate(4);
            $sbtPatients = Patient::where('patientName','LIKE',"%{$search}%")->where('branch','=',$branch)->where('programType','=','SBT')->simplePaginate(4);
        }
        else
        {
            $ivtPatients = Patient::where('programType','=','IVT')->simplePaginate(4);
            $sbtPatients = Patient::where('programType','=','SBT')->simplePaginate(4);
        }

        // dd(auth()->user()->user_type);

        return view('patients',[
        'ivtPatients'=>$ivtPatients,
        'sbtPatients'=>$sbtPatients,
        ]);

    }

    public function newProfile()
    {
        return view('profilepatient/createProfilePatient');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'profilePicture' => 'required',
            'patientName' => 'required',
            'mykid' => 'required',
            'programType' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'oku' => 'required',
            'school' => 'required',
            'branch' => 'required'
            ]);

        $image= $request->profilePicture;
        $image_new_name = time() . $image->getClientOriginalName();
        $image->move('profilePicture' , $image_new_name);

        $patient = new Patient;
        $patient->profilePicture = 'profilePicture/' . $image_new_name;
        $patient->patientName = $request->patientName;
        $patient->mykid = $request->mykid;
        $patient->parentID = $request->mykid;
        $patient->programType = $request->programType;
        $patient->age = $request->age;
        $patient->gender = $request->gender;
        $patient->dob = $request->dob;
        $patient->oku = $request->oku;
        $patient->school = $request->school;
        $patient->branch = $request->branch;
        $patient->save();

        return redirect()->route('patients');
    }
}
