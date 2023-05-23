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

    {{ $slot }}

    <!-- Latest compiled JavaScript -->
    <script src=" {{ asset('js/bootstrap.min.css') }}"></script>
    @livewireScripts
</body>

</html>
