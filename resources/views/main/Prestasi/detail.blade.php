@extends('Main.layouts.app')

@section('headerContent')
    <div class="crumbs-area">
        <div class="container">
            <div class="crumb-content">
                <h4 class="crumb-title">
                    <span>Detail</span>
                    Prestasi
                </h4>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="course-area ptb--120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="course-details">
                        <div class="cs-thumb mb-5">
                            <img src="{{ asset('assets/media/images/course/course-details.jpg') }}" class="w-100"
                                alt="image">
                            <span class="cs-price">Baru</span>
                            <div class="csd-hv-info has-color align-items-center">
                                <div class="course-dt-info">
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
                                </div>
                            </div>
                        </div>
                        <div class="cs-content">
                            <h3 class="mb-4"><a href="#">Excepteur sint occaecat cupidatat non proident </a></h3>
                            <p class="text-justify">
                                Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                                consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam
                                est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non
                                numquam eius modi tempora incidunt ut labore et dolore voluptatem.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
