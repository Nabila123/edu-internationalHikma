@extends('Main.layouts.app')

@section('headerContent')
    <div class="crumbs-area">
        <div class="container">
            <div class="crumb-content">
                <h4 class="crumb-title">
                    <span>Prestasi</span>
                </h4>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="course-area  pt--120 pb--70">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="card mb-5">
                        <div class="course-thumb">
                            <img src="{{ asset('assets/media/images/course/cs-img1.jpg') }}" alt="image">
                            <span class="cs-price primary-bg">Baru</span>
                        </div>
                        <div class="card-body  p-25">
                            <div class="course-meta-title mb-4">
                                <div class="course-meta-text">
                                    <h4><a href="course-details.html">Application Design Course</a></h4>
                                </div>
                            </div>
                            <p class="text-justify">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sciunt. Neque quisquam est, qui
                                dolorem ipsum tatem.
                            </p>

                            <a class="text-primary float-right mb-3 mt-n5" href="{{ route('prestasi.detil', [1]) }}"> Baca
                                Selengkapnya </a>
                            <ul class="course-meta-details list-inline  w-100">
                                <li>
                                    <p>Tahun</p>
                                    <span>2024</span>
                                </li>
                                <li>
                                    <p>Tempat / Lokasi</p>
                                    <span>Semarang</span>
                                </li>
                            </ul>
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card mb-5">
                        <div class="course-thumb">
                            <img src="{{ asset('assets/media/images/course/cs-img2.jpg') }}" alt="image">
                            <span class="cs-price primary-bg">Baru</span>
                        </div>
                        <div class="card-body  p-25">
                            <div class="course-meta-title mb-4">
                                <div class="course-meta-text">
                                    <h4><a href="course-details.html">Data Structure & Algorithm</a></h4>
                                </div>
                            </div>
                            <p class="text-justify">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sciunt. Neque quisquam est, qui
                                dolorem ipsum tatem.
                            </p>

                            <a class="text-primary float-right mb-3 mt-n5" href="{{ route('prestasi.detil', [1]) }}"> Baca
                                Selengkapnya </a>
                            <ul class="course-meta-details list-inline  w-100">
                                <li>
                                    <p>Tahun</p>
                                    <span>2024</span>
                                </li>
                                <li>
                                    <p>Tempat / Lokasi</p>
                                    <span>Semarang</span>
                                </li>
                            </ul>
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card mb-5">
                        <div class="course-thumb">
                            <img src="{{ asset('assets/media/images/course/cs-img3.jpg') }}" alt="image">
                        </div>
                        <div class="card-body  p-25">
                            <div class="course-meta-title mb-4">
                                <div class="course-meta-text">
                                    <h4><a href="course-details.html">Android App Development</a></h4>
                                </div>
                            </div>
                            <p class="text-justify">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sciunt. Neque quisquam est, qui
                                dolorem ipsum tatem.
                            </p>

                            <a class="text-primary float-right mb-3 mt-n5" href="{{ route('prestasi.detil', [1]) }}"> Baca
                                Selengkapnya </a>
                            <ul class="course-meta-details list-inline  w-100">
                                <li>
                                    <p>Tahun</p>
                                    <span>2024</span>
                                </li>
                                <li>
                                    <p>Tempat / Lokasi</p>
                                    <span>Semarang</span>
                                </li>
                            </ul>
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card mb-5">
                        <div class="course-thumb">
                            <img src="{{ asset('assets/media/images/course/cs-img4.jpg') }}" alt="image">
                        </div>
                        <div class="card-body  p-25">
                            <div class="course-meta-title mb-4">
                                <div class="course-meta-text">
                                    <h4><a href="course-details.html">Application Design Course</a></h4>
                                </div>
                            </div>
                            <p class="text-justify">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sciunt. Neque quisquam est, qui
                                dolorem ipsum tatem.
                            </p>

                            <a class="text-primary float-right mb-3 mt-n5" href="{{ route('prestasi.detil', [1]) }}"> Baca
                                Selengkapnya </a>
                            <ul class="course-meta-details list-inline  w-100">
                                <li>
                                    <p>Tahun</p>
                                    <span>2024</span>
                                </li>
                                <li>
                                    <p>Tempat / Lokasi</p>
                                    <span>Semarang</span>
                                </li>
                            </ul>
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card mb-5">
                        <div class="course-thumb">
                            <img src="{{ asset('assets/media/images/course/cs-img5.jpg') }}" alt="image">
                        </div>
                        <div class="card-body  p-25">
                            <div class="course-meta-title mb-4">
                                <div class="course-meta-text">
                                    <h4><a href="course-details.html">Application Design Course</a></h4>
                                </div>
                            </div>
                            <p class="text-justify">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sciunt. Neque quisquam est, qui
                                dolorem ipsum tatem.
                            </p>

                            <a class="text-primary float-right mb-3 mt-n5" href="{{ route('prestasi.detil', [1]) }}"> Baca
                                Selengkapnya </a>
                            <ul class="course-meta-details list-inline  w-100">
                                <li>
                                    <p>Tahun</p>
                                    <span>2024</span>
                                </li>
                                <li>
                                    <p>Tempat / Lokasi</p>
                                    <span>Semarang</span>
                                </li>
                            </ul>
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card mb-5">
                        <div class="course-thumb">
                            <img src="{{ asset('assets/media/images/course/cs-img6.jpg') }}" alt="image">
                        </div>
                        <div class="card-body  p-25">
                            <div class="course-meta-title mb-4">
                                <div class="course-meta-text">
                                    <h4><a href="course-details.html">Application Design Course</a></h4>
                                </div>
                            </div>
                            <p class="text-justify">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sciunt. Neque quisquam est, qui
                                dolorem ipsum tatem.
                            </p>

                            <a class="text-primary float-right mb-3 mt-n5" href="{{ route('prestasi.detil', [1]) }}"> Baca
                                Selengkapnya </a>
                            <ul class="course-meta-details list-inline  w-100">
                                <li>
                                    <p>Tahun</p>
                                    <span>2024</span>
                                </li>
                                <li>
                                    <p>Tempat / Lokasi</p>
                                    <span>Semarang</span>
                                </li>
                            </ul>
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div>
            </div>
        </div>
    </div>
@endsection
