<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="{{ asset('css/navbaradmin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    @yield('css')
</head>
<body>
    @include('partials._navbaradmin')
    <div class="container">
        @include('partials.sidebar')
        <div class="main-content">
            @yield('content')
        </div>
    </div>
</body>
</html>
