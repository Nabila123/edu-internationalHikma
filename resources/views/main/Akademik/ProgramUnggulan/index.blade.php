@extends('Main.layouts.app')

@section('headerContent')
    <div class="crumbs-area">
        <div class="container">
            <div class="crumb-content">
                <h4 class="crumb-title">
                    <span>Program</span>
                    Unggulan
                </h4>
            </div>
        </div>
    </div>

    <section class="feature-area pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-feature">
                        <div class="title">
                            <h4>Learn Online Courses</h4>
                        </div>
                        <div class="desc-wrap">
                            <p>
                                Usage of the Internet is becoming more common due to rapid advancement
                                of technology.
                            </p>
                            <a href="#">Join Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-feature">
                        <div class="title">
                            <h4>No.1 of universities</h4>
                        </div>
                        <div class="desc-wrap">
                            <p>
                                For many of us, our very first experience of learning about the celestial bodies begins when
                                we saw our first.
                            </p>
                            <a href="#">Join Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-feature">
                        <div class="title">
                            <h4>Huge Library</h4>
                        </div>
                        <div class="desc-wrap">
                            <p>
                                If you are a serious astronomy fanatic like a lot of us are, you can probably remember that
                                one event.
                            </p>
                            <a href="#">Join Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <div class="about-area ptb--70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-left-content">
                        <p style="text-align: justify">
                            <!-- Gambar diintegrasikan dalam teks dengan float -->
                            <img src="{{ asset('assets/media/images/teacher/teacher-member1.jpg') }}" alt="University Image"
                                class="responsive-img w-650px">

                            Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                            explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                            consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est,
                            qui dolorem ipsum
                            quia incidunt ut labore et dolore magnam aliquam quaerat voluptatem.

                            Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                            explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                            consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est,
                            qui dolorem ipsum
                            quia incidunt ut labore et dolore magnam aliquam quaerat voluptatem.

                            Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                            explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                            consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est,
                            qui dolorem ipsum
                            quia incidunt ut labore et dolore magnam aliquam quaerat voluptatem.

                            Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                            explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                            consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est,
                            qui dolorem ipsum
                            quia incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
                        </p>
                        <a href="#" class="btn btn-primary btn-round">Read more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="teacher-area befr-themeoclor pb--70">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6">
                    <div class="section-title">
                        <span class="text-uppercase">Learn from <span class="primary-color">the best</span></span>
                        <h2>Our Teachers </h2>
                    </div>
                </div>
            </div>
            <div class="teacher-carousel owl-carousel card-deck">
                <div class="card mb-5">
                    <img src="{{ asset('assets/media/images/teacher/teacher-member1.jpg') }}" alt="image">
                    <div class="card-body teacher-content p-25">
                        <h4 class="card-title mb-4"><a href="teachers.html">Patrick Garner Dony</a></h4>
                        <span class="primary-color d-block mb-3">Economist</span>
                        <p class="card-text">We’re a philosophical bunch here at School site and we have thought long and
                            hard about.</p>
                        <ul class="list-inline">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-deviantart"></i></a></li>
                            <li><a href="#"><i class="fa fa-github"></i></a></li>
                        </ul>
                    </div>
                </div><!-- card -->

                <div class="card mb-5">
                    <img src="{{ asset('assets/media/images/teacher/teacher-member2.jpg') }}" alt="image">
                    <div class="card-body teacher-content p-25">
                        <h4 class="card-title mb-4"><a href="teachers.html">Cameron Brown</a></h4>
                        <span class="primary-color d-block mb-3">Financier</span>
                        <p class="card-text">We’re a philosophical bunch here at School site and we have thought long and
                            hard about.</p>
                        <ul class="list-inline">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-deviantart"></i></a></li>
                            <li><a href="#"><i class="fa fa-github"></i></a></li>
                        </ul>
                    </div>
                </div><!-- card -->

                <div class="card mb-5">
                    <img src="{{ asset('assets/media/images/teacher/teacher-member3.jpg') }}" alt="image">
                    <div class="card-body teacher-content p-25">
                        <h4 class="card-title mb-4"><a href="teachers.html">Joseph Mack Monika</a></h4>
                        <span class="primary-color d-block mb-3">Languages</span>
                        <p class="card-text">We’re a philosophical bunch here at School site and we have thought long and
                            hard about.</p>
                        <ul class="list-inline">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-deviantart"></i></a></li>
                            <li><a href="#"><i class="fa fa-github"></i></a></li>
                        </ul>
                    </div>
                </div><!-- card -->
                <div class="card mb-5">
                    <img src="{{ asset('assets/media/images/teacher/teacher-member4.jpg') }}" alt="image">
                    <div class="card-body teacher-content p-25">
                        <h4 class="card-title mb-4"><a href="teachers.html">Patrick Garner Dony</a></h4>
                        <span class="primary-color d-block mb-3">Economist</span>
                        <p class="card-text">We’re a philosophical bunch here at School site and we have thought long and
                            hard about.</p>
                        <ul class="list-inline">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-deviantart"></i></a></li>
                            <li><a href="#"><i class="fa fa-github"></i></a></li>
                        </ul>
                    </div>
                </div><!-- card -->
            </div>
        </div>
    </div>
@endsection
