@props(['post' => $post, 'patient'=>$patient, 'images'=>$images])

<div class="mb-2 ">
    <div class="bg-gray-200 flex justify-between">
        <ul>
            <li>
                    <span class="bg-gray-200 px-2">{{date('jS  F Y ', strtotime($post->datePost))}}</span>
            </li>
        </ul>
        <ul>
            <li>
                <span class="bg-gray-200 px-2">{{date('l', strtotime($post->datePost))}}</span>
            </li>
        </ul>
    </div>

    <div class="flex justify-between">
        <div class="p-1">
            <p>{{ $post->body }}</p>
        </div>

        @if (auth()->user()->user_type=='therapist')
        <div class="flex justify-end">
            <a class="text-red-500 p-2" id="more" href="#" onclick="$('.{{$post->id}}').slideToggle(function(){$('#more').html($('.{{$post->id}}').is(':visible')?'Cancel':'Edit');});">
                Edit</a>
            <form action="{{route('deletepost', [$patient->mykid, $post->id])}} " method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" value="Delete" class="text-red-500 p-2"> Delete </button>
            </form>

        </div>
        @endif

    </div>


    <div class="p-1 flex justify-between ">
            <ul class="flex items-center">
                @foreach ($images as $image)
                    @if ($image->post_id==$post->id)
                        <li class="mr-2">
                            <div class="h-10 w-10 flex items-center">
                                <img src="{{ asset($image->image) }}" alt=""
                                class="object-cover h-10 w-full rounded-full">
                                {{-- <video src="{{ asset($image->image) }}" alt="Broken"></video> --}}
                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>
            <ul>
                <p>Therapist: {{$post->stamp}}</p>
            </ul>
    </div>

</div>

<div class="{{$post->id}} p-6 bg-red-50 w-full rounded-lg" style="display:none">
    <form action="{{route('updatepost', [$patient->mykid, $post->id])}}" method="POST" class="mb-4" enctype="multipart/form-data">
        @csrf

        <label class="block mb-3">
            <span class="text-gray-700">Select Date for Posting </span>
            <input name="datePost" class="form-input mt-1 block w-full border-2 pl-1
            @error ('datePost') border-red-500 @enderror"" type="date" value="{{$post->datePost}}">
            @error('datePost')
            <div class="text-red-500 mt-2 text-sm">
                {{$message}}
            </div>
            @enderror
        </label>

          <div class="">
            <label for="body" class="sr-only">Body</label>
            <textarea name="body" id="body" cols="40" rows="1" class="border-2 w-full p-4 rounded-lg
            @error ('body') border-red-500 @enderror"
            placeholder="Post Update !">{{$post->body}}</textarea>
            @error('body')
            <div class="text-red-500 mt-2 text-sm">
                {{$message}}
            </div>
            @enderror

        </div>

        <div class="p-1 flex justify-between ">
            <ul class="flex items-center">
                @foreach ($images as $image)
                    @if ($image->post_id==$post->id)
                            <li class="mr-2 flex">
                                <div class="h-10 w-10 flex items-center">
                                    <img src="{{ asset($image->image) }}" alt=""
                                    class="object-cover h-10 w-full rounded-full">
                                    {{-- <video src="{{ asset($image->image) }}" alt="Broken"></video> --}}
                                </div>
                                <input type="checkbox">
                            </li>
                        {{-- </a> --}}
                    @endif
                @endforeach
            </ul>
            <ul>
                <p>Therapist: {{$post->stamp}}</p>
            </ul>
        </div>

        <p class="mt-4">Add Photo</p>
        <div class="flex justify-between mt-2">
            <input type="file" name="image[]" class="" multiple>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 font-medium rounded ">Update</button>
        </div>

    {{-- <div>
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
    </div> --}}


    </form>
</div>

