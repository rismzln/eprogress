@extends('layouts.app')

@section('content')

<div class="flex justify-center items-start flex-wrap">
        <div class="items-start bg-white p-6 rounded-lg  w-3/4 max-w-screen-md	mb-10">
            <div class="w-full ">

                <h1 class="mb-4 font-semibold text-center">Register</h1>


                <form action="{{ route('register') }}"  method="POST">
                    @csrf

                    <label class="block">
                        <span class="text-gray-700">Username</span>
                        <input name="username" class="form-input mt-1 block w-full border-2 pl-1
                        @error('username') border-red-500" @enderror  value="{{ old('username') }}">
                      </label>
                    @error('username') <div class="text-red-500 mt-2 text-sm">{{ $message }}</div> @enderror

                    <label class="block mt-4">
                        <span class="text-gray-700">Mykad</span>
                        <input name="mykad" class="form-input mt-1 block w-full border-2 pl-1
                        @error('mykad') border-red-500" @enderror value="{{ old('mykad') }}">
                      </label>
                      @error('mykad') <div class="text-red-500 mt-2 text-sm">{{ $message }}</div> @enderror

                    <label class="block mt-4">
                        <span class="text-gray-700">Email</span>
                        <input name="email" class="form-input mt-1 block w-full border-2 pl-1
                        @error('email') border-red-500" @enderror value="{{ old('email') }}">
                      </label>
                      @error('email') <div class="text-red-500 mt-2 text-sm">{{ $message }}</div> @enderror


                    <label class="block mt-4">
                        <span class="text-gray-700">Password</span>
                        <input type="password" name="password" class="form-input mt-1 block w-full border-2 pl-1
                        @error('password') border-red-500" @enderror >
                      </label>
                    @error('password') <div class="text-red-500 mt-2 text-sm">{{ $message }}</div> @enderror

                    <label class="block mt-4">
                        <span class="text-gray-700">Repeat Password</span>
                        <input type="password" name="password_confirmation" class="form-input mt-1 block w-full border-2 pl-1 ">
                      </label>

                      <label class="block mt-4">
                        <span class="text-gray-700 ">Register as</span>
                        <select name="user_type" class="form-select mt-1 block w-full border-2  @error('user_type') border-red-500" @enderror value="">

                        <option value="therapist">Therapist</option>
                        <option value="user">Parent</option>

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
