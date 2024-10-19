@extends('Main.layouts.app')

@push('custom-styles')
    <link rel="stylesheet" href="{{ asset('assets/Main/css/flatpickr.min.css') }}">
@endpush

@section('headerContent')
    <div class="crumbs-area" style="padding:5rem">
        <div class="container">
        </div>
    </div>
@endsection
@section('content')
    <div class="about-area m-5 ptb--20">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="stepper stepper-pills stepper-column" id="kt_stepper_example_clickable">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="stepper-nav flex-center">
                                    <div class="stepper-item me-5 current" data-kt-stepper-element="nav"
                                        data-kt-stepper-action="step">
                                        <div class="stepper-wrapper d-flex align-items-center">
                                            <div class="stepper-icon w-40px h-40px">
                                                <i class="stepper-check fas fa-check"></i>
                                                <span class="stepper-number">1</span>
                                            </div>

                                            <div class="stepper-label">
                                                <h3 class="stepper-title lh-1">
                                                    Step 1
                                                </h3>

                                                <div class="stepper-desc">
                                                    Data Diri
                                                </div>
                                            </div>
                                        </div>
                                        <div class="stepper-line h-30px"></div>
                                    </div>

                                    <div class="stepper-item me-5" data-kt-stepper-element="nav"
                                        data-kt-stepper-action="step">
                                        <div class="stepper-wrapper d-flex align-items-center">
                                            <div class="stepper-icon w-40px h-40px">
                                                <i class="stepper-check fas fa-check"></i>
                                                <span class="stepper-number">2</span>
                                            </div>

                                            <div class="stepper-label">
                                                <h3 class="stepper-title lh-1">
                                                    Step 2
                                                </h3>

                                                <div class="stepper-desc">
                                                    Pendidikan
                                                </div>
                                            </div>
                                        </div>
                                        <div class="stepper-line h-30px"></div>

                                    </div>

                                    <div class="stepper-item me-5" data-kt-stepper-element="nav"
                                        data-kt-stepper-action="step">
                                        <div class="stepper-wrapper d-flex align-items-center">
                                            <div class="stepper-icon w-40px h-40px">
                                                <i class="stepper-check fas fa-check"></i>
                                                <span class="stepper-number">3</span>
                                            </div>

                                            <div class="stepper-label">
                                                <h3 class="stepper-title lh-1">
                                                    Step 3
                                                </h3>

                                                <div class="stepper-desc">
                                                    Pengalaman Kerja
                                                </div>
                                            </div>
                                        </div>
                                        <div class="stepper-line h-30px"></div>

                                    </div>

                                    <div class="stepper-item me-5" data-kt-stepper-element="nav"
                                        data-kt-stepper-action="step">
                                        <div class="stepper-wrapper d-flex align-items-center">
                                            <div class="stepper-icon w-40px h-40px">
                                                <i class="stepper-check fas fa-check"></i>
                                                <span class="stepper-number">4</span>
                                            </div>

                                            <div class="stepper-label">
                                                <h3 class="stepper-title lh-1">
                                                    Step 4
                                                </h3>

                                                <div class="stepper-desc">
                                                    Pengalaman Mengajar
                                                </div>
                                            </div>
                                        </div>
                                        <div class="stepper-line h-30px"></div>
                                    </div>

                                    <div class="stepper-item me-5" data-kt-stepper-element="nav"
                                        data-kt-stepper-action="step">
                                        <div class="stepper-wrapper d-flex align-items-center">
                                            <div class="stepper-icon w-40px h-40px">
                                                <i class="stepper-check fas fa-check"></i>
                                                <span class="stepper-number">5</span>
                                            </div>

                                            <div class="stepper-label">
                                                <h3 class="stepper-title lh-1">
                                                    Step 5
                                                </h3>

                                                <div class="stepper-desc">
                                                    Organisasi
                                                </div>
                                            </div>
                                        </div>
                                        <div class="stepper-line h-30px"></div>
                                    </div>

                                    <div class="stepper-item me-5" data-kt-stepper-element="nav"
                                        data-kt-stepper-action="step">
                                        <div class="stepper-wrapper d-flex align-items-center">
                                            <div class="stepper-icon w-40px h-40px">
                                                <i class="stepper-check fas fa-check"></i>
                                                <span class="stepper-number">6</span>
                                            </div>

                                            <div class="stepper-label">
                                                <h3 class="stepper-title lh-1">
                                                    Step 6
                                                </h3>

                                                <div class="stepper-desc">
                                                    Hafalan Qur'an
                                                </div>
                                            </div>
                                        </div>
                                        <div class="stepper-line h-30px"></div>
                                    </div>

                                    <div class="stepper-item me-5" data-kt-stepper-element="nav"
                                        data-kt-stepper-action="step">
                                        <div class="stepper-wrapper d-flex align-items-center">
                                            <div class="stepper-icon w-40px h-40px">
                                                <i class="stepper-check fas fa-check"></i>
                                                <span class="stepper-number">7</span>
                                            </div>

                                            <div class="stepper-label">
                                                <h3 class="stepper-title lh-1">
                                                    Step 7
                                                </h3>

                                                <div class="stepper-desc">
                                                    Kemampuan
                                                </div>
                                            </div>
                                        </div>
                                        <div class="stepper-line h-30px"></div>
                                    </div>

                                    <div class="stepper-item me-5" data-kt-stepper-element="nav"
                                        data-kt-stepper-action="step">
                                        <div class="stepper-wrapper d-flex align-items-center">
                                            <div class="stepper-icon w-40px h-40px">
                                                <i class="stepper-check fas fa-check"></i>
                                                <span class="stepper-number">8</span>
                                            </div>

                                            <div class="stepper-label">
                                                <h3 class="stepper-title lh-1">
                                                    Step 8
                                                </h3>

                                                <div class="stepper-desc">
                                                    Kemampuan Lainnya
                                                </div>
                                            </div>
                                        </div>
                                        <div class="stepper-line h-30px"></div>
                                    </div>

                                    <div class="stepper-item me-5" data-kt-stepper-element="nav"
                                        data-kt-stepper-action="step">
                                        <div class="stepper-wrapper d-flex align-items-center">
                                            <div class="stepper-icon w-40px h-40px">
                                                <i class="stepper-check fas fa-check"></i>
                                                <span class="stepper-number">9</span>
                                            </div>

                                            <div class="stepper-label">
                                                <h3 class="stepper-title lh-1">
                                                    Step 9
                                                </h3>

                                                <div class="stepper-desc">
                                                    Esai
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-9">
                                <form class="form w-lg-500px mx-auto" novalidate="novalidate">
                                    <div class="mb-5">
                                        <div class="flex-column current" data-kt-stepper-element="content">
                                            @include('main.Karier.TabLowongan.dataDiri')
                                        </div>

                                        <div class="flex-column" data-kt-stepper-element="content">
                                            @include('main.Karier.TabLowongan.pendidikan')
                                        </div>

                                        <div class="flex-column" data-kt-stepper-element="content">
                                            @include('main.Karier.TabLowongan.pengalamanKerja')
                                        </div>

                                        <div class="flex-column" data-kt-stepper-element="content">
                                            @include('main.Karier.TabLowongan.pengalamanMengajar')
                                        </div>

                                        <div class="flex-column" data-kt-stepper-element="content">
                                            @include('main.Karier.TabLowongan.organisasi')
                                        </div>

                                        <div class="flex-column" data-kt-stepper-element="content">
                                            @include('main.Karier.TabLowongan.hafalan')
                                        </div>

                                        <div class="flex-column" data-kt-stepper-element="content">
                                            @include('main.Karier.TabLowongan.kemampuan')
                                        </div>

                                        <div class="flex-column" data-kt-stepper-element="content">
                                            @include('main.Karier.TabLowongan.kemampuanLain')
                                        </div>

                                        <div class="flex-column" data-kt-stepper-element="content">
                                            @include('main.Karier.TabLowongan.esay')
                                        </div>

                                    </div>

                                    <div class="d-flex flex-stack justify-content-end">
                                        <div class="mr-2">
                                            <button type="button" class="btn btn-sm btn-secondary text-white p-4"
                                                data-kt-stepper-action="previous">
                                                Back
                                            </button>
                                        </div>

                                        <div>
                                            <button type="button" class="btn btn-sm btn-primary p-4"
                                                data-kt-stepper-action="submit">
                                                <span class="indicator-label">
                                                    Kirim Lamaran
                                                </span>
                                            </button>

                                            <button type="button" class="btn btn-sm btn-primary p-4"
                                                data-kt-stepper-action="next">
                                                Next
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
    <script src='{{ asset('assets/plugins/global/plugins.bundle.js') }}'></script>
    <script src="{{ asset('assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
    <script src='{{ asset('assets/js/scripts.bundle.js') }}'></script>
    <script>
        var element = document.querySelector("#kt_stepper_example_clickable");
        var stepper = new KTStepper(element);
        stepper.on("kt.stepper.click", function(stepper) {
            stepper.goTo(stepper.getClickedStepIndex()); // go to clicked step
        });
        stepper.on("kt.stepper.next", function(stepper) {
            stepper.goNext(); // go next step
        });
        stepper.on("kt.stepper.previous", function(stepper) {
            stepper.goPrevious(); // go previous step
        });
    </script>
@endpush
