@extends('layouts.app')

@section('content')

    <div class="flex justify-center text-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            Therapist
            <div class="grid grid-flow-row md:grid-flow-col p-3">
                @for ($i = 0; $i < 5; $i++)
                    <div class="h-40 w-40 bg-blue-400  rounded-lg m-auto my-4 md:mx-4 ">
                        Adam {{$i + 1}}
                    </div>
                @endfor
            </div>
        </div>
    </div>

@endsection
