<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Penawar Special Learning Centre</title>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
</head>
<body class="bg-blue-100">
    <nav class="p-6 bg-white flex  justify-between mb-6">
        <ul class="flex items-center">
            <li>
                <a href="/" class="p-3">Home</a>
            </li>
            @auth
                <li>
                    <a href="/patients" class="p-3">Patients  </a>
                </li>
            @endauth
            <li>
                <a href="/therapists" class="p-3">Therapists</a>
            </li>
        </ul>

        <ul class="flex items-center">
            @auth
            <li>
                <span href="" class="p-3">{{auth()->user()->username}}</span>
            </li>
            <li>
                <span href="" class="p-3">{{auth()->user()->user_type}}</span>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="" class="p-3 inline">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
            @endauth

            @guest
            <li>
                <a href="{{ route('login') }}" class="p-3">Login</a>
            </li>
            <li>
                <a href="{{ route('register') }}" class="p-3">Register</a>
            </li>
            @endguest
        </ul>
    </nav>
    @yield('content')

    <script src="https://code.jquery.com/jquery-1.12.4.js">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js">
    <script>
        $( function(){
            $(".datepicker").datepicker();
        });
    </script>


</body>
</html>
