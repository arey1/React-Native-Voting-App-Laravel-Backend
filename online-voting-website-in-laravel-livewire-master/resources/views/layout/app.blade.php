<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting {{ $title }}</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    @livewireStyles

</head>
<style>
    .bg-image {
        background: rgba(0, 0, 0, 0.5) url('https://images.unsplash.com/photo-1616891722586-e572f3ea8acb?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTF8fGVsZWN0aW9ufGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=400&q=60');
        background-blend-mode: darken;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        width: 100%;
        height: 30vh;
    }

</style>

<body>
    <nav class="container-fluid bg-dark">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="nav-link text-white">Home</h3>
                <div class="d-flex text-white align-items-center">
                    @auth
                        <h5>{{ Auth::user()->name }}</h5>
                        @livewire('frontend.logout')
                    @endauth
                    @guest
                        <a href="{{ route('front.login') }}" class="nav-link text-white">Login</a>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
    <!-- hero section -->
    <div class="container-fluid bg-image" style="">
        <div class="container">
            <div class="d-flex justify-content-center align-items-center flex-col" style="height:30vh;">
                <h1 class="text-white">{{ $image_title }}</h1> <br>
            </div>
            @auth
                <h4>Total Votes : {{ Auth::user()->vote_limit }}</h4>

            @endauth

        </div>
    </div>

    {{ $slot }}
    
    <!-- Latest compiled JavaScript -->
    <script src=" {{ asset('js/bootstrap.min.css') }}">
    </script>

    @livewireScripts
</body>

</html>
