@extends('Main.layouts.app')

@section('headerContent')
    <div class="crumbs-area">
        <div class="container">
            <div class="crumb-content">
                <h4 class="crumb-title">
                    <span>Kabar</span>
                </h4>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="blog-area  pt--120 pb--70">
        <div class="container">
            <div class="row">
                <!-- blog single start -->
                <div class="col-lg-4 col-md-6">
                    <div class="card mb-5">
                        <img class="card-img-top" src="{{ asset('assets/media/images/blog/blog-thumbnail1.jpg') }}"
                            alt="image">
                        <div class="card-body p-25">
                            <ul class="list-inline blog-meta mb-3">
                                <li><i class="fa fa-clock-o"></i> AUGUST 6, 2017</li>
                                <li><i class="fa fa-comments"></i> 3 Comments</li>
                            </ul>
                            <h4 class="card-title mb-4"><a href="{{ route('berita.kabar.detil', [1]) }}">The Death Of
                                    architechture</a></h4>
                            <p class="card-text">We’re a philosophical bunch here at School site and we have thought long
                                and hard about.</p>
                            <a class="btn btn-primary btn-round btn-sm" href="{{ route('berita.kabar.detil', [1]) }}"> Baca
                                Selengkapnya </a>
                        </div>
                    </div><!-- card -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card mb-5">
                        <img class="card-img-top" src="{{ asset('assets/media/images/blog/blog-thumbnail2.jpg') }}"
                            alt="image">
                        <div class="card-body p-25">
                            <ul class="list-inline blog-meta mb-3">
                                <li><i class="fa fa-clock-o"></i> AUGUST 6, 2017</li>
                                <li><i class="fa fa-comments"></i> 3 Comments</li>
                            </ul>
                            <h4 class="card-title mb-4"><a href="{{ route('berita.kabar.detil', [1]) }}">The Death Of
                                    architechture</a></h4>
                            <p class="card-text">We’re a philosophical bunch here at School site and we have thought long
                                and hard about.</p>
                            <a class="btn btn-primary btn-round btn-sm" href="{{ route('berita.kabar.detil', [1]) }}"> Baca
                                Selengkapnya </a>
                        </div>
                    </div><!-- card -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card mb-5">
                        <img class="card-img-top" src="{{ asset('assets/media/images/blog/blog-thumbnail3.jpg') }}"
                            alt="image">
                        <div class="card-body p-25">
                            <ul class="list-inline blog-meta mb-3">
                                <li><i class="fa fa-clock-o"></i> AUGUST 6, 2017</li>
                                <li><i class="fa fa-comments"></i> 3 Comments</li>
                            </ul>
                            <h4 class="card-title mb-4"><a href="{{ route('berita.kabar.detil', [1]) }}">The Death Of
                                    architechture</a></h4>
                            <p class="card-text">We’re a philosophical bunch here at School site and we have thought long
                                and hard about.</p>
                            <a class="btn btn-primary btn-round btn-sm" href="{{ route('berita.kabar.detil', [1]) }}"> Baca
                                Selengkapnya </a>
                        </div>
                    </div><!-- card -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card mb-5">
                        <img class="card-img-top" src="{{ asset('assets/media/images/blog/blog-thumbnail4.jpg') }}"
                            alt="image">
                        <div class="card-body p-25">
                            <ul class="list-inline blog-meta mb-3">
                                <li><i class="fa fa-clock-o"></i> AUGUST 6, 2017</li>
                                <li><i class="fa fa-comments"></i> 3 Comments</li>
                            </ul>
                            <h4 class="card-title mb-4"><a href="{{ route('berita.kabar.detil', [1]) }}">Aenean id
                                    ullamcorper</a>
                            </h4>
                            <p class="card-text">We’re a philosophical bunch here at School site and we have thought long
                                and hard about.</p>
                            <a class="btn btn-primary btn-round btn-sm" href="{{ route('berita.kabar.detil', [1]) }}"> Baca
                                Selengkapnya </a>
                        </div>
                    </div><!-- card -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card mb-5">
                        <img class="card-img-top" src="{{ asset('assets/media/images/blog/blog-thumbnail5.jpg') }}"
                            alt="image">
                        <div class="card-body p-25">
                            <ul class="list-inline blog-meta mb-3">
                                <li><i class="fa fa-clock-o"></i> AUGUST 6, 2017</li>
                                <li><i class="fa fa-comments"></i> 3 Comments</li>
                            </ul>
                            <h4 class="card-title mb-4"><a href="{{ route('berita.kabar.detil', [1]) }}">The Death Of
                                    architechture</a></h4>
                            <p class="card-text">We’re a philosophical bunch here at School site and we have thought long
                                and hard about.</p>
                            <a class="btn btn-primary btn-round btn-sm" href="{{ route('berita.kabar.detil', [1]) }}"> Baca
                                Selengkapnya </a>
                        </div>
                    </div><!-- card -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card mb-5">
                        <img class="card-img-top" src="{{ asset('assets/media/images/blog/blog-thumbnail6.jpg') }}"
                            alt="image">
                        <div class="card-body p-25">
                            <ul class="list-inline blog-meta mb-3">
                                <li><i class="fa fa-clock-o"></i> AUGUST 6, 2017</li>
                                <li><i class="fa fa-comments"></i> 3 Comments</li>
                            </ul>
                            <h4 class="card-title mb-4"><a href="{{ route('berita.kabar.detil', [1]) }}">The Death Of
                                    architechture</a></h4>
                            <p class="card-text">We’re a philosophical bunch here at School site and we have thought long
                                and hard about.</p>
                            <a class="btn btn-primary btn-round btn-sm" href="{{ route('berita.kabar.detil', [1]) }}"> Baca
                                Selengkapnya </a>
                        </div>
                    </div><!-- card -->
                </div>
                <!-- blog single end -->
            </div>
        </div>
    </div>
@endsection
