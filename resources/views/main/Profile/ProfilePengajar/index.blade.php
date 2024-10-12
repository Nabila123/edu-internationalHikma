@extends('Main.layouts.app')

@push('custom-styles')
    {{-- <style>
        .custom-tab .nav-link:hover,
        .custom-tab .nav-link:active {
            color: inherit !important;
            text-decoration: none !important;
            outline: none !important;
        }
    </style> --}}
@endpush

@section('headerContent')
    <div class="crumbs-area">
        <div class="container">
            <div class="crumb-content">
                <h4 class="crumb-title">
                    <span>Profile</span>
                    Pengajar
                </h4>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="all-teachers pt--70 pb--70">
        <div class="container custom-tab">
            <div class="row">
                <div class="col-md-9">
                    <div class="tab-content" id="subjectTabContent">
                        <div class="tab-pane fade show active" id="economics" role="tabpanel"
                            aria-labelledby="economics-tab">
                            <h3 class="mb-5">Economics Teachers</h3>
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="card mb-5">
                                        <img src="{{ asset('assets/media/images/teacher/teacher-member1.jpg') }}"
                                            alt="image">
                                        <div class="card-body teacher-content p-25">
                                            <h4 class="card-title mb-1"><a href="teacher-details.html">Patrick Garner
                                                    Dony</a></h4>
                                            <span class="primary-color d-block mb-4">Economist</span>
                                            <p class="card-text">We’re a philosophical bunch here at School site and we have
                                                thought long and hard about.</p>
                                            <ul class="list-inline">
                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                                <li><a href="#"><i class="fa fa-deviantart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-github"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="finance" role="tabpanel" aria-labelledby="finance-tab">
                            <h3 class="mb-5">Finance Teachers</h3>
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="card mb-5">
                                        <img src="{{ asset('assets/media/images/teacher/teacher-member2.jpg') }}"
                                            alt="image">
                                        <div class="card-body teacher-content p-25">
                                            <h4 class="card-title mb-1"><a href="teacher-details.html">Cameron Brown</a>
                                            </h4>
                                            <span class="primary-color d-block mb-4">Financier</span>
                                            <p class="card-text">We’re a philosophical bunch here at School site and we have
                                                thought long and hard about.</p>
                                            <ul class="list-inline">
                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                                <li><a href="#"><i class="fa fa-deviantart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-github"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="languages" role="tabpanel" aria-labelledby="languages-tab">
                            <h3 class="mb-5">Languages Teachers</h3>
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="card mb-5">
                                        <img src="{{ asset('assets/media/images/teacher/teacher-member3.jpg') }}"
                                            alt="image">
                                        <div class="card-body teacher-content p-25">
                                            <h4 class="card-title mb-1"><a href="teacher-details.html">Joseph Mack
                                                    Monika</a></h4>
                                            <span class="primary-color d-block mb-4">Languages</span>
                                            <p class="card-text">We’re a philosophical bunch here at School site and we
                                                have thought long and hard about.</p>
                                            <ul class="list-inline">
                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                                <li><a href="#"><i class="fa fa-deviantart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-github"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 border p-3">
                    <div class="widget">
                        <h4 class="fwidget-title mb-5 pb-3 primary-color">Kategori Pengajar</h4>
                        <ul class="nav flex-column nav-pills" id="subjectTab" role="tablist" aria-orientation="vertical">
                            <li class="nav-item no-hover-section">
                                <a class="nav-link active" id="economics-tab" data-toggle="pill" href="#economics"
                                    role="tab" aria-controls="economics" aria-selected="true">
                                    <i class="fa fa-arrow-right"></i>
                                    Economics
                                </a>
                            </li>
                            <li class="nav-item no-hover-section">
                                <a class="nav-link" id="finance-tab" data-toggle="pill" href="#finance" role="tab"
                                    aria-controls="finance" aria-selected="false">
                                    <i class="fa fa-arrow-right"></i>
                                    Finance
                                </a>
                            </li>
                            <li class="nav-item no-hover-section">
                                <a class="nav-link" id="languages-tab" data-toggle="pill" href="#languages"
                                    role="tab" aria-controls="languages" aria-selected="false">
                                    <i class="fa fa-arrow-right"></i>
                                    Languages
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
