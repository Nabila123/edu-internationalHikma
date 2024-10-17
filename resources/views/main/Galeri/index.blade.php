@extends('Main.layouts.app')

@section('headerContent')
    <div class="crumbs-area">
        <div class="container">
            <div class="crumb-content">
                <h4 class="crumb-title">
                    <span>Galeri</span>
                </h4>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="gallery-area section-gap pt--120 pb--70">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <a href="{{ asset('assets/media/images/gallery/g1.jpg') }}" class="img-gal">
                        <div class="single-imgs relative">
                            <div class="overlay overlay-bg"></div>
                            <div class="relative">
                                <img class="img-fluid" src="{{ asset('assets/media/images/gallery/g1.jpg') }}"
                                    alt="">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-5">
                    <a href="{{ asset('assets/media/images/gallery/g2.jpg') }}" class="img-gal">
                        <div class="single-imgs relative">
                            <div class="overlay overlay-bg"></div>
                            <div class="relative">
                                <img class="img-fluid" src="{{ asset('assets/media/images/gallery/g2.jpg') }}"
                                    alt="">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="{{ asset('assets/media/images/gallery/g3.jpg') }}" class="img-gal">
                        <div class="single-imgs relative">
                            <div class="overlay overlay-bg"></div>
                            <div class="relative">
                                <img class="img-fluid" src="{{ asset('assets/media/images/gallery/g3.jpg') }}"
                                    alt="">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="{{ asset('assets/media/images/gallery/g4.jpg') }}" class="img-gal">
                        <div class="single-imgs relative">
                            <div class="overlay overlay-bg"></div>
                            <div class="relative">
                                <img class="img-fluid" src="{{ asset('assets/media/images/gallery/g4.jpg') }}"
                                    alt="">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="{{ asset('assets/media/images/gallery/g5.jpg') }}" class="img-gal">
                        <div class="single-imgs relative">
                            <div class="overlay overlay-bg"></div>
                            <div class="relative">
                                <img class="img-fluid" src="{{ asset('assets/media/images/gallery/g5.jpg') }}"
                                    alt="">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-5">
                    <a href="{{ asset('assets/media/images/gallery/g6.jpg') }}" class="img-gal">
                        <div class="single-imgs relative">
                            <div class="overlay overlay-bg"></div>
                            <div class="relative">
                                <img class="img-fluid" src="{{ asset('assets/media/images/gallery/g6.jpg') }}"
                                    alt="">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-7">
                    <a href="{{ asset('assets/media/images/gallery/g7.jpg') }}" class="img-gal">
                        <div class="single-imgs relative">
                            <div class="overlay overlay-bg"></div>
                            <div class="relative">
                                <img class="img-fluid" src="{{ asset('assets/media/images/gallery/g7.jpg') }}"
                                    alt="">
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
    <script>
        $('.img-gal').magnificPopup({
            type: 'image',
            gallery: {
                enabled: true,
            },
        });
    </script>
@endpush
