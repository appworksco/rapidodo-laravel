<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Appworks Co.">
    <!-- Slick Slider -->
    <link rel="stylesheet" href="{{ asset('vendor/slick/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/slick/slick/slick-theme.css') }}">
    <!-- Feather Icon-->
    <link rel="stylesheet" href="{{ asset('vendor/icons/feather.css') }}">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Sidebar CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/sidebar/demo.css') }}">
    <title>Rapidodo | The delivery you can trust</title>
</head>

<body class="fixed-bottom-bar">

    <header class="section-header">
        <!-- Header content goes here -->
        @include('partials.header')
    </header>

    <div class="content">
        @yield('content')
    </div>

    <footer>
        <!-- Footer content goes here -->
        @include('partials.footer')
    </footer>
</body>

</html>