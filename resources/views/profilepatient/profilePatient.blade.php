@extends('layouts.app')

@section('content')

<div class="flex justify-center items-start flex-wrap">
        <div class="items-start bg-white p-6 rounded-lg mb-4">
            <div class="w-full  text-center ">

                <h1 class="mb-4 font-semibold">Profile</h1>

                <div class="bg-purple-500 rounded-full h-40 w-40 m-auto flex items-center justify-center mb-4">
                    <img src="{{ asset($patient->profilePicture) }}" alt="Broken"
                    class="h-40 w-40 rounded-full">
                </div>

                @if (auth()->user()->user_type=='therapist')
                    <a href="{{route('edit.patient.profile', $patient->mykid)}}" class="m-1 text-blue-500 bg-blue-50">Edit</a>
                @endif

                <div class="">
                    <p>{{ucwords(strtolower($patient->patientName))}}</p>
                    <p>{{$patient->mykid}}</p>
                    <p>{{$patient->age}} years old</p>
                    <p>{{ucwords(strtolower($patient->gender))}}</p>
                    <p>{{$patient->dob}}</p>
                    <p>{{$patient->branch}}</p>

                    <p>Therapist :</p>
                    <br>
                </div>

                <div class="bg-gray-200 m-auto" style="width: 300px">
                    <span>Media</span>
                    <ul class="flex flex-wrap justify-center	">
                        @foreach ($images->take(6) as $image)
                            <li>
                                <div class="flex-1">
                                    @if ($image->extension=='jpg'|$image->extension=='png')
                                        <a href="{{ route('images',[ $patient->mykid, $image->id ]) }}">
                                            <img src="{{ asset($image->image) }}" alt="Broken"  class="object-cover"
                                            style="width: 100px; height:100px;">
                                        </a>
                                    @else
                                        <a href="{{ route('images',[ $patient->mykid, $image->id ]) }}">
                                            <video  controls style="width: 100px; height:100px;" 123>
                                                <source src="{{ asset($image->image)}}" type="video/webm">
                                                Your browser does not support the video tag.
                                            </video>
                                        </a>

                                    @endif
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>

        <div class="bg-white p-6 rounded-lg mx-3 w-4/5 md:w-2/5 max-w-screen-sm ">

            @if (auth()->user()->user_type=='therapist')
            <form action="{{route('posts', $patient->mykid)}}" method="post" class="mb-4" enctype="multipart/form-data">
                @csrf

                <label class="block mb-3">
                    <span class="text-gray-700">Select Date for Posting </span>
                    <input name="datePost" class="form-input mt-1 block w-full border-2 pl-1 @error ('datePost') border-red-500 @enderror"" type="date" value="">
                    @error('datePost')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                    @enderror
                </label>

                  <div class="">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" cols="40" rows="1"
                    class="border-2 w-full p-4 rounded-lg
                    @error ('body') border-red-500 @enderror"
                    placeholder="Post Update !"></textarea>
                    @error('body')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                    @enderror

                </div>

                <div class="flex justify-between mt-2">
                    <input type="file" name="image[]" class="" multiple>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 font-medium rounded mb-2">Post</button>
                </div>

                <div>
                    @if (\Session::has('post'))
                        <div class="bg-green-50 p-3 rounded-lg text-center text-green-600">
                            <ul>
                                <li>{!! \Session::get('post') !!} !</li>
                            </ul>
                        </div>
                    @elseif(\Session::has('delete'))
                        <div class="bg-red-50 p-3 rounded-lg text-center text-red-600">
                            <ul>
                                <li>{!! \Session::get('delete') !!} !</li>
                            </ul>
                        </div>
                    @endif
                </div>
            </form>
            @endif


            @if ($posts->count())
                @foreach ($posts as $post)
                    <x-post :post="$post"  :patient="$patient"  :images="$images"/>
                @endforeach
                {{ $posts->links() }}
            @else
            <p>no post</p>
            @endif

        </div>

</div>
@endsection
