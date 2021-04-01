@extends('layouts.app')

@section('content')

<div class="flex justify-center items-start flex-wrap">
        <div class="items-start bg-white p-6 rounded-lg  w-3/4 max-w-screen-md	mb-10">
            <div class="w-full ">

                <h1 class="mb-4 font-semibold text-center">Profile</h1>

                <div class="bg-purple-500 rounded-full h-40 w-40 m-auto flex items-center justify-center mb-4">
                    Picture
                </div>

                <form  enctype="multipart/form-data" method="POST">
                    @csrf

                    <span class="text-gray-700 flex justify-center ">Choose Photo</span>
                    <label class="text-center flex justify-center ">
                        <input type="file" name="profilePicture"  class="border-2  mt-1">
                    </label>
                    @error('profilePicture') <div class="text-red-500 mt-2 text-sm text-center">{{ $message }}</div> @enderror


                    <label class="block">
                        <span class="text-gray-700">Name</span>
                        <input name="patientName" class="form-input mt-1 block w-full border-2 pl-1 @error('patientName') border-red-500" @enderror  value="">
                      </label>
                    @error('patientName') <div class="text-red-500 mt-2 text-sm">{{ $message }}</div> @enderror

                    <label class="block mt-4">
                        <span class="text-gray-700">Mykid</span>
                        <input name="mykid" class="form-input mt-1 block w-full border-2 pl-1 @error('mykid') border-red-500" @enderror value="">
                      </label>
                      @error('mykid') <div class="text-red-500 mt-2 text-sm">{{ $message }}</div> @enderror

                      <div class="mt-4">
                        <span class="text-gray-700">Program Type</span>
                        <div class="mt-2">
                          <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="programType" value="IVT">
                            <span class="ml-2">IVT</span>
                          </label>
                          <label class="inline-flex items-center ml-6">
                            <input type="radio" class="form-radio" name="programType" value="SBT">
                            <span class="ml-2">SBT</span>
                          </label>
                          @error('programType') <div class="text-red-500 mt-2 text-sm">{{ $message }}</div> @enderror
                        </div>
                      </div>

                      <div class="mt-4">
                        <span class="text-gray-700">Gender</span>
                        <div class="mt-2">
                          <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="gender" value="Male">
                            <span class="ml-2">Male</span>
                          </label>
                          <label class="inline-flex items-center ml-6">
                            <input type="radio" class="form-radio" name="gender" value="Female">
                            <span class="ml-2">Female</span>
                          </label>
                          @error('gender') <div class="text-red-500 mt-2 text-sm">{{ $message }}</div> @enderror
                        </div>
                      </div>

                    <label class="block mt-4">
                        <span class="text-gray-700">Age</span>
                        <input name="age" class="form-input mt-1 block w-full border-2 pl-1  @error('age') border-red-500" @enderror value="">
                      </label>
                    @error('age') <div class="text-red-500 mt-2 text-sm">{{ $message }}</div> @enderror

                    <label class="block mt-4">
                        <span class="text-gray-700">Date</span>
                        <input type="date" name="dob" class="form-input mt-1 block w-full border-2 pl-1  @error('dob') border-red-500" @enderror  >
                      </label>
                    @error('dob') <div class="text-red-500 mt-2 text-sm">{{ $message }}</div> @enderror

                    <label class="block mt-4">
                        <span class="text-gray-700">OKU</span>
                        <input name="oku" class="form-input mt-1 block w-full border-2 pl-1  @error('oku') border-red-500" @enderror value="">
                      </label>
                    @error('oku') <div class="text-red-500 mt-2 text-sm">{{ $message }}</div> @enderror

                    <label class="block mt-4">
                        <span class="text-gray-700">School</span>
                        <input name="school" class="form-input mt-1 block w-full border-2 pl-1  @error('school') border-red-500" @enderror value="">
                    </label>
                    @error('school') <div class="text-red-500 mt-2 text-sm">{{ $message }}</div> @enderror


                      <label class="block mt-4">
                        <span class="text-gray-700 ">Branch</span>
                        <select name="branch" class="form-select mt-1 block w-full border-2  @error('branch') border-red-500" @enderror value="PSLC KUANTAN PAHANG ">
                          <option>PSLC SKUDAI,JOHOR</option>
                          <option>PSLC PASIR GUDANG,JOHOR</option>
                          <option>PSLC BANDAR BARU UDA,JOHOR</option>
                          <option>UNIVERSITI REHAB CENTER,JOHOR</option>
                          <option>PSLC KLUANG,JOHOR</option>
                          <option>PSLC MELAKA</option>
                          <option>PSLC TAMAN MELAWATI,KUALA LUMPUR</option>
                          <option>PSLC KUANTAN,PAHANG</option>
                        </select>
                      </label>


                      <div class="flex justify-center mx-2">
                          <p></p>
                          <button class="flex-row-reverse bg-blue-500 text-white px-4 py-1 font-medium rounded mt-5 " type="submit">Create</button>
                    </div>

                </form>

            </div>
        </div>

</div>
@endsection
