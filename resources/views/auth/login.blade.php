@extends('layouts.app')

@section('content')

<div class="flex justify-center items-start flex-wrap">
        <div class="items-start bg-white p-6 rounded-lg  w-3/4 max-w-screen-md	mb-10">
            <div class="w-full ">

                <h1 class="mb-4 font-semibold text-center">Login</h1>

                @if (session('status'))
                <div class="bg-red-50 p-3 rounded-lg text-center text-red-600">
                    {{session('status')}}
                </div>
                @endif

                <form action="{{ route('login') }}"  method="POST">
                    @csrf

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

                        {{-- <label class="block mt-4">
                            <span class="text-gray-700 ">Login as</span>
                            <select name="user_type" class="form-select mt-2 block w-full border-2 p-1  @error('user_type') border-red-500" @enderror value="">
                            <option value="therapist">Therapist</option>
                            <option value="user">Parent</option>

                            </select>
                        </label> --}}

                      <div class="flex justify-center mx-2">
                          <p></p>
                          <button class="flex-row-reverse bg-blue-500 text-white px-4 py-1 font-medium rounded mt-5 " type="submit">Login</button>
                    </div>

                </form>

            </div>
        </div>

</div>
@endsection
