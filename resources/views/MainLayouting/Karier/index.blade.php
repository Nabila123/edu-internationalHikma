@extends('layouts.app')
@section('toolbar')
    <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack "
        data-select2-id="select2-data-kt_app_toolbar_container">
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                Data Karier / Lowongan
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
                <li class="breadcrumb-item text-muted"> Data Karier / Lowongan </li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
@endsection
@push('custom-scripts')
    <script type="text/javascript">
        $(document).ready(function() {});
    </script>
@endpush
