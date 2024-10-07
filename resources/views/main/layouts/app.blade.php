<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/media/images/icon/favicon.ico') }}" />

    <!-- all css here -->
    <link rel="stylesheet" href="{{ asset('assets/Main/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/Main/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/Main/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/Main/css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/Main/css/slicknav.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/Main/css/typography.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/Main/css/default-css.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/Main/css/styles.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/Main/css/responsive.css') }}" />

    @stack('custom-styles')
</head>

<body>
    @include('Main.layouts.partials._page-loader')
    @include('Main.layouts._default')
    

    <script src="{{ asset('assets/Main/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <script src="{{ asset('assets/Main/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{ asset('assets/Main/js/bootstrap.min.js') }}"></script>
    <!-- others plugins -->
    <script src="{{ asset('assets/Main/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/Main/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/Main/js/jquery.slicknav.min.js') }}"></script>
    <script src="{{ asset('assets/Main/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/Main/js/scripts.js') }}"></script>
    @stack('custom-scripts')
</body>

</html>
