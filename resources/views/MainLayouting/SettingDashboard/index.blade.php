@extends('layouts.app')
@section('toolbar')
    <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack "
        data-select2-id="select2-data-kt_app_toolbar_container">
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                Data Setting & Dashboard
            </h1>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <li class="breadcrumb-item text-muted">
                    <a href="#" class="text-muted text-hover-primary"> Home </a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted"> Main Layouting </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted"> Data Setting & Dashboard </li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div id="kt_app_content_container" class="app-container  container-xxl ">
        <div class="card mb-5 mb-xl-10">
            <div class="card-body p-0 ps-10">
                <div class="d-flex flex-wrap flex-sm-nowrap">
                    <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5 active" data-bs-toggle="tab"
                                href="#logoHeader">
                                Logo & Slide Header </a>
                        </li>
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5" data-bs-toggle="tab" href="#headerSide">
                                Header Side </a>
                        </li>
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5" data-bs-toggle="tab" href="#video">
                                Video </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card mb-5 mb-xl-10">
            <div class="card-body p-7">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="logoHeader" role="tabpanel">
                        @include('MainLayouting.SettingDashboard.Tab.logoHeader')
                    </div>
                    <div class="tab-pane fade" id="headerSide" role="tabpanel">
                        @include('MainLayouting.SettingDashboard.Tab.headerSide')
                    </div>
                    <div class="tab-pane fade" id="video" role="tabpanel">
                        @include('MainLayouting.SettingDashboard.Tab.video')
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @push('custom-scripts')
        <script type="text/javascript">
            $(document).ready(function() {});
        </script>
    @endpush
