<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System {{ $title }}</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    @livewireStyles

</head>

<body style="background-color: rgb(224, 224, 224);">
    <div class="container-fluid p-2">
        <h1 class="text-center">Online Voting System</h1>
        {{-- @if (Auth::guard('admin')->user->username) --}}
        <h4 class="text-center">{{ Auth::guard('admin')->user()->username }}</h4>
        {{-- @endif --}}
    </div>
    <hr>
    <div class="container">
        <div class="row flex justify-content-center">
            <div class="col-xl-2 my-3 col-lg-2 col-md-3 col-sm-4 col-3">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-danger w-100">Dashboard</a>

            </div>
            <div class="col-xl-2 my-3 col-lg-2 col-md-3 col-sm-4 col-3">
                <a href="{{ route('admin.votes') }}" class="btn btn-danger w-100">Votes</a>

            </div>
            <div class="col-xl-2 my-3 col-lg-2 col-md-3 col-sm-4 col-3">
                <a href="{{ route('admin.positions') }}" class="btn btn-danger w-100">Position</a>
            </div>
            <div class="col-xl-2 my-3 col-lg-2 col-md-3 col-sm-4 col-3">
                <a href="{{ route('admin.condidates') }}" class="btn btn-danger w-100">Candidates</a>
            </div>
            <div class="col-xl-2 my-3 col-lg-2 col-md-3 col-sm-4 col-3">
                <a href="{{ route('admin.voters') }}" class="btn btn-danger w-100">Voters</a>

            </div>
            
            <div class="col-xl-2 my-3 col-lg-2 col-md-3 col-sm-4 col-3">
                <div class="dropdown">
                    <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown">
                        {{ Auth::guard('admin')->user()->username }}
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item btn btn-danger"
                                href="{{ route('admin.change_password') }}">Change
                                Password</a></li>
                        <li>
                            @livewire('admin.logout')
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    {{ $slot }}
    
    <!-- Latest compiled JavaScript -->
    <script src=" {{ asset('js/bootstrap.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    @livewireScripts
</body>

</html>
