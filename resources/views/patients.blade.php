@extends('layouts.app')

@section('content')

    <div class="flex justify-center text-center">
        <div class="w-8/12 bg-white p-6 rounded-lg ">
            Patients

            @if (auth()->user()->user_type=='therapist')
            <div class="text-blue-700 p-4 m-3">
                <a class="bg-blue-500 px-5 py-2 rounded-lg text-center text-white" href="{{ route('create.patient.profile') }}">Create Profile Patient</a>
            </div>

            <div>
                <form action="{{ route('patients')}}" method="get">
                    <input class=" m-2 shadow-inner	bg-gray-50 rounded-lg text-center p-1" type="text" name="search" placeholder="Search" value="{{ request()->query('search') }}">
                    <label class="">
                        <span class="text-gray-700 pr-2">Branch</span>
                        <select name="branch" class="form-select border-2 mr-2 p-1">
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
                    <button class=" bg-white hover:bg-gray-100  text-gray-800 py-1 px-3
                    border border-gray-400 rounded shadow" type="submit">
                    Search </button>
                </form>
            </div>
            @endif

            <div class="flex justify-center items-start flex-wrap mt-6">

                @if (auth()->user()->user_type=='user')
                <ul class=" p-4 mb-10 rounded-lg bg-gray-100 shadow-sm">
                    <div class="flex flex-wrap self-center m-auto">
                        @foreach ($patients as $patient)
                        <a class="flex-1  m-3 item-center" href="{{ route('patient.profile', $patient->mykid)}}">
                            <div  class="shadow-sm bg-blue-400  rounded-lg p-4 m-auto flex flex-wrap items-center justify-center" style="width: 200px; height:200px;">
                                <p class="">{{ucwords(strtolower($patient->patientName))}}</p>
                                <p class="px-5 mx-2 text-gray-500 text-sm">{{$patient->programType}}</p>
                                <p class="">{{strtoupper($patient->branch)}}</p>
                            </div>
                        </a>
                        @endforeach
                    </div>

                    @forelse ($patients as $patient)
                    @empty
                    <p class="flex justify-center text-center">
                        <strong>{{request()->query('search')}}</strong> has no result
                    </p>
                    @endforelse
                </ul>

                @elseif (auth()->user()->user_type=='therapist')

                <ul class=" p-4 mb-10 rounded-lg bg-gray-100 shadow-sm">
                    <p class="font-bold ">IVT</p>
                    <div class="flex flex-wrap self-center m-auto">
                        @foreach ($ivtPatients as $patient)
                        <a class="flex-1  m-3 item-center" href="{{ route('patient.profile', $patient->mykid)}}">
                            <div  class="shadow-sm bg-blue-400  rounded-lg p-4 m-auto flex flex-wrap items-center justify-center" style="width: 200px; height:200px;">
                                <p class="">{{ucwords(strtolower($patient->patientName))}}</p>
                                <p class="px-5 mx-2 text-gray-500 text-sm">{{$patient->programType}}</p>
                                <p class="">{{strtoupper($patient->branch)}}</p>
                            </div>
                        </a>
                        @endforeach
                    </div>

                    @forelse ($sbtPatients as $patient)
                    @empty
                    <p class="flex justify-center text-center">
                        <strong>{{request()->query('search')}}</strong> has no result
                    </p>
                    @endforelse
                </ul>

                <ul class="p-4 mb-6 rounded-lg bg-gray-100 shadow-sm">
                    <p class="font-bold bg ">SBT</p>
                    <div class="flex flex-wrap self-center m-auto ">
                        @foreach ($sbtPatients as $patient)
                        <a class="flex-1  m-3 item-center" href="{{ route('patient.profile', $patient->mykid)}}">
                            <div  class="bg-blue-400  rounded-lg p-4 m-auto flex flex-wrap items-center justify-center" style="width: 200px; height:200px;">
                                <p class="">{{ucwords(strtolower($patient->patientName))}}</p>
                                <p class="px-5 mx-2 text-gray-500 text-sm">{{$patient->programType}}</p>
                                <p class="">{{strtoupper($patient->branch)}}</p>
                            </div>
                        </a>
                        @endforeach
                    </div>

                    @forelse ($sbtPatients as $patient)
                    @empty
                    <p class="flex justify-center text-center">
                        <strong>{{request()->query('search')}}</strong> has no result
                    </p>
                    @endforelse
                </ul>

            </div>

            {{ $sbtPatients->appends([ 'search' => request()->query('search') ])->links() }}
            @endif

        </div>
    </div>

@endsection
