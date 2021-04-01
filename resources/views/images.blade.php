@extends('layouts.app')

@section('content')

    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <p class="text-center font-bold mb-4">Media</p>
                @if ($image->extension=='jpg'|$image->extension=='png')
                    <img class="rounded-lg" src="{{asset($image->image)}}" alt="Broken">
                @else
                    <video  controls class="w-full"  data-full="{{ asset($image->image) }}">
                    <source src="{{asset($image->image)}}" type="video/webm">
                        Your browser does not support the video tag.
                    </video>
                @endif

            <ul class="flex  justify-between mt-6">
                @if ($prev=='no')
                <li>
                    <p>No previous Picture</p>
                </li>
                @else
                <li>
                    <a class="bg-gray-500 text-white py-3 px-5 rounded-lg"
                    href="{{ route('images',[ $mykid, $prev ])}}">Prev</a>
                </li>

                @endif

                <li>
                    <a class="bg-blue-500 text-white py-3 px-5 rounded-lg" href="{{route('patient.profile', $mykid)}}"> Back to profile </a>
                </li>
                @if ($next=='no')
                <li>
                    <p>No Next Picture</p>
                </li>
                @else
                <li>
                    <a class="bg-gray-500 text-white py-3 px-5 rounded-lg"
                    href="{{ route('images',[ $mykid, $next ])}}">Next </a>
                </li>

                @endif

            </ul>



        </div>
    </div>

@endsection
