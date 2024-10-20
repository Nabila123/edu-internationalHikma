@extends('Main.layouts.app')

@push('custom-styles')
    <style>
        .single-popular-carusel .meta {
            margin-top: -26px;
            z-index: 2;
            position: inherit;
            padding: 0px 10px;
        }

        .single-popular-carusel .meta p {
            font-size: 12px;
            font-weight: 300;
            color: #fff;
            margin-bottom: 0px;
        }

        .single-popular-carusel .meta p .lnr {
            margin: 0px 5px;
        }

        .single-popular-carusel .meta span {
            color: #fff;
        }
    </style>
@endpush

@section('content')
    <div class="slider-area owl-carousel has-color" data-left-arrow="{{ asset('assets/media/images/angle-left.png') }}"
        data-right-arrow="{{ asset('assets/media/images/angle-right.png') }}">
        <div class="slider_item"
            style=" background: url({{ asset('assets/media/images/bg/slider-bg1.jpg') }})
            center/cover no-repeat; ">
            <div class="container mt-n20">
                <div class="row">
                    <div class="col-lg-7 col-md-9 mt-n20">
                        <div class="slider-content">
                            <h3>Selamat Datang</h3>
                            <h2>
                                <span class="primary-color">Hikma Internatioanl</span> School
                            </h2>
                            <p>
                                Ilmu yang Bermanfaat, Iman yang Kokoh
                            </p>
                            <a class="btn btn-primary btn-round btn-lg mt-5" href="#">Start Learning Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="feature-area pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-feature">
                        <div class="title">
                            <h4>Cambridge Class Program</h4>
                        </div>
                        <div class="desc-wrap">
                            <p>
                                Usage of the Internet is becoming more common due to rapid advancement
                                of technology.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-feature">
                        <div class="title">
                            <h4>Tahfidz Class Program</h4>
                        </div>
                        <div class="desc-wrap">
                            <p>
                                For many of us, our very first experience of learning about the celestial bodies begins when
                                we saw our first.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-feature">
                        <div class="title">
                            <h4>ICT Class Program</h4>
                        </div>
                        <div class="desc-wrap">
                            <p>
                                If you are a serious astronomy fanatic like a lot of us are, you can probably remember that
                                one event.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="popular-course-area section-gap pt--120 pb--70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-6">
                    <div class="section-title">
                        <span class="text-uppercase fs-4">Selalu Dapatkan Update Terbaru Mengenai Prestasi Sekolah / Siswa
                            Kami.</span>
                        <h2>Prestasi Terbaru</h2>
                    </div>
                </div>
            </div>
            <div class="prestasi-carousel owl-carousel card-deck">
                <div class="card mb-5">
                    <div class="single-popular-carusel">
                        <div class="thumb-wrap relative">
                            <div class="thumb relative">
                                <div class="overlay overlay-bg"></div>
                                <img class="img-fluid" src="{{ asset('assets/media/images/p1.jpg') }}" alt="" />
                            </div>
                            <div class="meta d-flex justify-content-between">
                                <p>
                                    <span class="lnr fa-regular fa-calendar"></span>355
                                </p>
                                <span>New 5</span>
                            </div>
                        </div>
                        <div class="details p-3">
                            <h5>Learn Designing</h5>
                            <p>
                                When television was young, there was a hugely popular show
                                based on the still popular fictional characte
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card mb-5">
                    <div class="single-popular-carusel">
                        <div class="thumb-wrap relative">
                            <div class="thumb relative">
                                <div class="overlay overlay-bg"></div>
                                <img class="img-fluid" src="{{ asset('assets/media/images/p1.jpg') }}" alt="" />
                            </div>
                            <div class="meta d-flex justify-content-between">
                                <p>
                                    <span class="lnr fa-regular fa-calendar"></span>355
                                </p>
                                <span>New 5</span>
                            </div>
                        </div>
                        <div class="details p-3">
                            <h5>Learn Designing</h5>
                            <p>
                                When television was young, there was a hugely popular show
                                based on the still popular fictional characte
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card mb-5">
                    <div class="single-popular-carusel">
                        <div class="thumb-wrap relative">
                            <div class="thumb relative">
                                <div class="overlay overlay-bg"></div>
                                <img class="img-fluid" src="{{ asset('assets/media/images/p1.jpg') }}" alt="" />
                            </div>
                            <div class="meta d-flex justify-content-between">
                                <p>
                                    <span class="lnr fa-regular fa-calendar"></span>355
                                </p>
                                <span>New 5</span>
                            </div>
                        </div>
                        <div class="details p-3">
                            <h5>Learn Designing</h5>
                            <p>
                                When television was young, there was a hugely popular show
                                based on the still popular fictional characte
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card mb-5">
                    <div class="single-popular-carusel">
                        <div class="thumb-wrap relative">
                            <div class="thumb relative">
                                <div class="overlay overlay-bg"></div>
                                <img class="img-fluid" src="{{ asset('assets/media/images/p1.jpg') }}" alt="" />
                            </div>
                            <div class="meta d-flex justify-content-between">
                                <p>
                                    <span class="lnr fa-regular fa-calendar"></span>355
                                </p>
                                <span>New 5</span>
                            </div>
                        </div>
                        <div class="details p-3">
                            <h5>Learn Designing</h5>
                            <p>
                                When television was young, there was a hugely popular show
                                based on the still popular fictional characte
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card mb-5">
                    <div class="single-popular-carusel">
                        <div class="thumb-wrap relative">
                            <div class="thumb relative">
                                <div class="overlay overlay-bg"></div>
                                <img class="img-fluid" src="{{ asset('assets/media/images/p1.jpg') }}" alt="" />
                            </div>
                            <div class="meta d-flex justify-content-between">
                                <p>
                                    <span class="lnr fa-regular fa-calendar"></span>355
                                </p>
                                <span>New 5</span>
                            </div>
                        </div>
                        <div class="details p-3">
                            <h5>Learn Designing</h5>
                            <p>
                                When television was young, there was a hugely popular show
                                based on the still popular fictional characte
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <div class="take-toure-area ptb--120">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="section-title sec-style-two">
                        <img class="title-top-shape" src="{{ asset('assets/media/images/icon/title-top-shape.png') }}"
                            alt="image" />
                        <span class="text-uppercase">Take A Tour</span>
                        <h2>Video tour on Edification</h2>
                    </div>
                </div>
            </div>
            <div class="video-area">
                <a class="expand-video" href="https://www.youtube.com/watch?v=cdfMgotGKIM"><i class="fa fa-play"></i></a>
            </div>
        </div>
    </div>

    <div class="course-area pb--70">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="section-title">
                        <h2>Berita Terbaru Kami</h2>
                    </div>
                </div>
            </div>

            <div class="commn-carousel owl-carousel card-deck">
                <div class="card mb-5">
                    <div class="course-thumb">
                        <img src="{{ asset('assets/media/images/course/cs-img1.jpg') }}" alt="image" />
                        <span class="cs-price primary-bg">$150</span>
                    </div>
                    <div class="card-body p-25">
                        <div class="course-meta-title mb-4">
                            <div class="course-meta-text">
                                <h4>
                                    <a href="course-details.html">Application Design Course</a>
                                </h4>
                                <ul class="course-meta-stats">
                                    <li>
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i><i class="fa fa-star-half"></i>
                                    </li>
                                    <li>36 <i class="fa fa-comment"></i></li>
                                    <li>85 <i class="fa fa-heart"></i></li>
                                </ul>
                            </div>
                            <a href="course-details.html"><img class="course-meta-thumbnail rounded-circle"
                                    src="{{ asset('assets/media/images/author/auth1.jpg') }}" alt="image" />
                            </a>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                            sciunt. Neque quisquam est, qui dolorem ipsum tatem.
                        </p>
                        <ul class="course-meta-details list-inline w-100">
                            <li>
                                <p>Course</p>
                                <span>3 Year</span>
                            </li>
                            <li>
                                <p>Class Size</p>
                                <span>18</span>
                            </li>
                            <li>
                                <p>Duration</p>
                                <span>1 hour</span>
                            </li>
                        </ul>
                    </div>
                    <!-- card-body -->
                </div>
                <!-- card -->

                <div class="card mb-5">
                    <div class="course-thumb">
                        <img src="{{ asset('assets/media/images/course/cs-img2.jpg') }}" alt="image" />
                        <span class="cs-price primary-bg">$150</span>
                    </div>
                    <div class="card-body p-25">
                        <div class="course-meta-title mb-4">
                            <div class="course-meta-text">
                                <h4>
                                    <a href="course-details.html">Data Structure & Algorithm</a>
                                </h4>
                                <ul class="course-meta-stats">
                                    <li>
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i><i class="fa fa-star-half"></i>
                                    </li>
                                    <li>36 <i class="fa fa-comment"></i></li>
                                    <li>85 <i class="fa fa-heart"></i></li>
                                </ul>
                            </div>
                            <a href="course-details.html"><img class="course-meta-thumbnail rounded-circle"
                                    src="{{ asset('assets/media/images/author/auth1.jpg') }}" alt="image" />
                            </a>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                            sciunt. Neque quisquam est, qui dolorem ipsum tatem.
                        </p>
                        <ul class="course-meta-details list-inline w-100">
                            <li>
                                <p>Course</p>
                                <span>3 Year</span>
                            </li>
                            <li>
                                <p>Class Size</p>
                                <span>18</span>
                            </li>
                            <li>
                                <p>Duration</p>
                                <span>1 hour</span>
                            </li>
                        </ul>
                    </div>
                    <!-- card-body -->
                </div>
                <!-- card -->

                <div class="card mb-5">
                    <div class="course-thumb">
                        <img src="{{ asset('assets/media/images/course/cs-img3.jpg') }}" alt="image" />
                        <span class="cs-price primary-bg">$150</span>
                    </div>
                    <div class="card-body p-25">
                        <div class="course-meta-title mb-4">
                            <div class="course-meta-text">
                                <h4>
                                    <a href="course-details.html">Android App Development</a>
                                </h4>
                                <ul class="course-meta-stats">
                                    <li>
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i><i class="fa fa-star-half"></i>
                                    </li>
                                    <li>36 <i class="fa fa-comment"></i></li>
                                    <li>85 <i class="fa fa-heart"></i></li>
                                </ul>
                            </div>
                            <a href="course-details.html"><img class="course-meta-thumbnail rounded-circle"
                                    src="{{ asset('assets/media/images/author/auth1.jpg') }}" alt="image" />
                            </a>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                            sciunt. Neque quisquam est, qui dolorem ipsum tatem.
                        </p>
                        <ul class="course-meta-details list-inline w-100">
                            <li>
                                <p>Course</p>
                                <span>3 Year</span>
                            </li>
                            <li>
                                <p>Class Size</p>
                                <span>18</span>
                            </li>
                            <li>
                                <p>Duration</p>
                                <span>1 hour</span>
                            </li>
                        </ul>
                    </div>
                    <!-- card-body -->
                </div>
                <!-- card -->
            </div>
        </div>
    </div>

    <div class="testimonial-area ptb--70">
        <img class="tst-bg" src="{{ asset('assets/media/images/bg/tst-bg-shape.png') }}" alt="image" />
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 text-center">
                    <div class="tst-carousel owl-carousel">
                        <div class="testimonial-content pb--40">
                            <div class="section-title sec-style-two">
                                <span class="text-uppercase primary-color mb-0">happy students</span>
                                <h2>Testimonial</h2>
                            </div>
                            <h3>
                                ‘‘ Vous devez profiter de la vie. Toujours aimez, les
                                personnespositives penser. ‘‘
                            </h3>
                            <h4>Kawsar Ahhamed</h4>
                            <span>App Developer</span>
                        </div>
                        <div class="testimonial-content pb--40">
                            <div class="section-title sec-style-two">
                                <span class="text-uppercase primary-color mb-0">happy students</span>
                                <h2>Testimonial</h2>
                            </div>
                            <h3>
                                ‘‘ Vous devez profiter de la vie. Toujours aimez, les
                                personnespositives penser. ‘‘
                            </h3>
                            <h4>Kawsar Ahhamed</h4>
                            <span>App Developer</span>
                        </div>
                        <div class="testimonial-content pb--40">
                            <div class="section-title sec-style-two">
                                <span class="text-uppercase primary-color mb-0">happy students</span>
                                <h2>Testimonial</h2>
                            </div>
                            <h3>
                                ‘‘ Vous devez profiter de la vie. Toujours aimez, les
                                personnespositives penser. ‘‘
                            </h3>
                            <h4>Kawsar Ahhamed</h4>
                            <span>App Developer</span>
                        </div>
                    </div>
                </div>
                <!-- row -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
@endsection

@push('custom-scripts')
    <script>
        $(document).ready(function() {
            $(".prestasi-carousel").owlCarousel({
                loop: true,
                autoplay: true,
                dots: true,
                margin: 0,
                autoplayTimeout: 3000,
                nav: true,
                smartSpeed: 800,
                navText: [
                    '<i class="fa fa-angle-left"></i>',
                    '<i class="fa fa-angle-right"></i>',
                ],
                responsive: {
                    0: {
                        items: 1,
                    },
                    480: {
                        items: 1,
                    },
                    768: {
                        items: 2,
                    },
                    1024: {
                        items: 3,
                    },
                },
            });
        });
    </script>
@endpush
