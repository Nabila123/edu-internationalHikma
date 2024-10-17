@extends('Main.layouts.app')

@push('custom-styles')
    <style>
        .card:hover {
            box-shadow: none !important;
        }
    </style>
@endpush

@section('headerContent')
    <div class="crumbs-area">
        <div class="container">
            <div class="crumb-content">
                <h4 class="crumb-title">
                    <span>Karier</span>
                    / Lowongan
                </h4>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="about-area m-5 ptb--20">
        <div class="row">
            <div class="col-lg-12">
                <div class="card border-0 mb-3">
                    <div class="card-header bg-default d-flex justify-content-between align-items-baseline">
                        <div class="card-title text-white fs-2 font-weight-bold">
                            Cari Karier / Lowongan
                        </div>
                        <button type="button" class="btn btn-sm btn-dark text-white fs-4" data-toggle="modal"
                            data-target="#modalFilter">
                            Filter
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card mb-3">
                    <div class="card-body ml-3">
                        <div class="row">
                            <div class="col-lg-12 row">
                                <div class="col">
                                    <span class="d-block">
                                        <div class="course-meta-title">
                                            <div class="course-meta-text">
                                                <h4>Guru Matematika</h4>
                                            </div>
                                        </div>
                                    </span>
                                    <span class="d-block fs-4 mb-4">
                                        <i class="fa-solid fa-graduation-cap"></i>
                                        Min. S1
                                    </span>
                                </div>
                                <div class="col">
                                    <span class="d-block text-right fs-4 mb-4">
                                        Posted 4 minggu ago
                                    </span>
                                    <span class="d-block text-right fs-4">
                                        <a href="{{ route('karier.detil', [1]) }}"
                                            class="btn btn-sm btn-primary text-white fs-4">
                                            Lihat Detail
                                        </a>
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <span class="d-block fs-3 fw-bolder">Deskripsi</span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sciunt. Neque quisquam est, qui
                                    dolorem ipsum tatem.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-body ml-3">
                        <div class="row">
                            <div class="col-lg-12 row">
                                <div class="col">
                                    <span class="d-block">
                                        <div class="course-meta-title">
                                            <div class="course-meta-text">
                                                <h4>Guru Matematika</h4>
                                            </div>
                                        </div>
                                    </span>
                                    <span class="d-block fs-4 mb-4">
                                        <i class="fa-solid fa-graduation-cap"></i>
                                        Min. S1
                                    </span>
                                </div>
                                <div class="col">
                                    <span class="d-block text-right fs-4 mb-4">
                                        Posted 4 minggu ago
                                    </span>
                                    <span class="d-block text-right fs-4">
                                        <a href="{{ route('karier.detil', [1]) }}"
                                            class="btn btn-sm btn-primary text-white fs-4">
                                            Lihat Detail
                                        </a>
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <span class="d-block fs-3 fw-bolder">Deskripsi</span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sciunt. Neque quisquam est, qui
                                    dolorem ipsum tatem.</p>
                            </div>
                            <div class="col-lg-12">
                                <span class="d-block fs-4">
                                    Pengajar | Penuh Waktu
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('main.Karier.modalKarier')
@endsection
