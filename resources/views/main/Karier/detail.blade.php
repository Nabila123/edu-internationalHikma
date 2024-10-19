@extends('Main.layouts.app')

@push('custom-styles')
    <style>
        .modal-backdrop {
            display: none;
        }
    </style>
@endpush

@section('headerContent')
    <div class="crumbs-area">
        <div class="container">
            <div class="crumb-content">
                <h4 class="crumb-title">
                    <span>Detail</span>
                    Karier / Lowongan
                </h4>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="about-area m-5 ptb--20">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-left-content">
                        <div class="section-title">
                            <div class="row">
                                <div class="col-lg-8 col-md-12">
                                    <h2>Guru Matematika</h2>
                                    <ul class="course-meta-details list-inline border-top-0 w-100">
                                        <li>
                                            <p>Tempat / Lokasi</p>
                                            <span>Semarang</span>
                                        </li>
                                        <li>
                                            <p>Kategori</p>
                                            <span>Pengajar / Guru</span>
                                        </li>
                                        <li>
                                            <p>Jenis Pekerjaan</p>
                                            <span>Full Time</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <span class="d-block text-right fs-4 mb-4">
                                        Apply Sebelum 30 Oktober 2024
                                    </span>
                                    <span class="d-block text-right fs-4">
                                        <a href="{{ route('karier.create') }}"
                                            class="btn btn-sm btn-primary text-white fs-4">
                                            Lamar Lowongan
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                            explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                            consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est,
                            qui dolorem ipsum quia incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                        <a href="#" class="btn btn-primary btn-round">Read more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('main.Karier.modalKarier')
@endsection
