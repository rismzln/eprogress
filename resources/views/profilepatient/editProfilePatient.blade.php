@extends('layouts.app')

@section('content')

<div class="flex justify-center items-start flex-wrap">
        <div class="items-start bg-white p-6 rounded-lg  w-3/4 max-w-screen-md	mb-10">
            <div class="w-full ">

                <h1 class="mb-4 font-semibold text-center">Profile</h1>

                <div class="bg-purple-500 rounded-full h-40 w-40 m-auto flex items-center justify-center mb-4">
                    <img src="{{ asset($patient->profilePicture) }}" alt="Broken"
                    class="h-40 w-40 rounded-full">
                </div>

                <form action="{{route('edit.patient.profile', $patient->mykid)}}"  enctype="multipart/form-data" method="POST">
                    @csrf

                    <span class="text-gray-700 flex justify-center ">Choose Photo</span>
                    <label class="text-center flex justify-center">
                        <input type="file" name="profilePicture" value="{{$patient->profilePicture}}" class="border-2 mt-1">
                    </label>

                    <label class="block">
                        <span class="text-gray-700">Name</span>
                        <input name="name" class="form-input mt-1 block w-full border-2 pl-1"  value="{{ucwords(strtolower($patient->patientName))}}">
                      </label>
                    <label class="block mt-4">
                        <span class="text-gray-700">Mykid</span>
                        <input name="mykid" class="form-input mt-1 block w-full border-2 pl-1" value="{{$patient->mykid}}">
                      </label>

                      <div class="mt-4">
                        <span class="text-gray-700">Program Type</span>
                        <div class="mt-2">
                          <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="programType" value="IVT"  {{ ($patient->programType=="IVT")? "checked" : "" }}>
                            <span class="ml-2">IVT</span>
                          </label>
                          <label class="inline-flex items-center ml-6">
                            <input type="radio" class="form-radio" name="programType" value="SBT" {{ ($patient->programType=="SBT")? "checked" : "" }}>
                            <span class="ml-2">SBT</span>
                          </label>
                        </div>
                      </div>

                      <div class="mt-4">
                        <span class="text-gray-700">Gender</span>
                        <div class="mt-2">
                          <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="gender" value="Male"  {{ ($patient->gender=="Male"||$patient->gender=="male")? "checked" : "" }}>
                            <span class="ml-2">Male</span>
                          </label>
                          <label class="inline-flex items-center ml-6">
                            <input type="radio" class="form-radio" name="gender" value="Female"  {{ ($patient->gender=="Female"||$patient->gender=="female")? "checked" : "" }}>
                            <span class="ml-2">Female</span>
                          </label>
                        </div>
                      </div>

                    <label class="block mt-4">
                        <span class="text-gray-700">Age</span>
                        <input name="age" class="form-input mt-1 block w-full border-2 pl-1" value="{{$patient->age}}">
                      </label>
                    <label class="block mt-4">
                        <span class="text-gray-700">Date</span>
                        <input name="dob" class="form-input mt-1 block w-full border-2 pl-1" type="date" value="{{$patient->dob}}">
                      </label>
                    <label class="block mt-4">
                        <span class="text-gray-700">OKU</span>
                        <input name="oku" class="form-input mt-1 block w-full border-2 pl-1" value="{{ucwords(strtolower($patient->oku))}}">
                      </label>
                    <label class="block mt-4">
                        <span class="text-gray-700">School</span>
                        <input name="school" class="form-input mt-1 block w-full border-2 pl-1" value="{{ucwords(strtolower($patient->school))}}">
                    </label>

                      <label class="block mt-4">
                        <span class="text-gray-700 ">Branch</span>
                        <select name="branch" class="form-select mt-1 block w-full border-2" {{ ( $patient->branch == "PSLC TAMAN MELAWATI KUALA LUMPUR") ? 'selected' : '' }}>
                          <option value="PSLC SKUDAI JOHOR">PSLC SKUDAI JOHOR</option>
                          <option value="PSLC MELAKA">PSLC MELAKA</option>
                          <option value="PSLC TAMAN MELAWATI KUALA LUMPUR">PSLC TAMAN MELAWATI KUALA LUMPUR</option>
                          <option value="PSLC KUANTAN PAHANG">PSLC KUANTAN PAHANG</option>
                        </select>
                      </label>

                      <div class="flex justify-center mx-2">
                          <p></p>
                          <button class="flex-row-reverse bg-blue-500 text-white px-4 py-1 font-medium rounded mt-5 " type="submit">Update</button>
                    </div>

                </form>

            </div>
        </div>

</div>
@endsection
