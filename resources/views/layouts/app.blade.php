<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href='{{ asset('assets/media/logos/favicon.svg') }}' />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" /> <!--end::Fonts-->
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href='{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}' rel="stylesheet"
        type="text/css" />
    <link href='{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}' rel="stylesheet"
        type="text/css" />
    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href='{{ asset('assets/plugins/global/plugins.bundle.css') }}' rel="stylesheet" type="text/css" />
    <link href='{{ asset('assets/css/style.bundle.css') }}' rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <title>Document</title>

    @stack('custom-styles')
</head>

<body id="kt_app_body" data-kt-app-page-loading-enabled="true" data-kt-app-page-loading="on"
    data-kt-app-layout="light-header" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true"
    class="app-default">
    @include('layouts.partials._page-loader')
    @include('partials._scrolltop')
    @include('layouts._default')
    @include('sweetalert::alert')


    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src='{{ asset('assets/plugins/global/plugins.bundle.js') }}'></script>
    <script src='{{ asset('assets/js/scripts.bundle.js') }}'></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src='{{ asset('assets/js/widgets.bundle.js') }}'></script>
    <script src='{{ asset('assets/js/custom/widgets.js') }}'></script>
    <script src='{{ asset('assets/js/custom/apps/chat/chat.js') }}'></script>
    <script src='{{ asset('assets/js/custom/utilities/modals/upgrade-plan.js') }}'></script>
    <script src='{{ asset('assets/js/custom/utilities/modals/users-search.js') }}'></script>
    <!--end::Custom Javascript-->

    <!--begin::Custom Javascript(used for this page only)-->
    @stack('custom-scripts')
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
