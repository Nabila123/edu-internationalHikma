<form id="formSettingLogo" method="POST" action="{{ route('main.setting-dashboard.updateLogo') }}"
    enctype="multipart/form-data">
    @csrf
    <div class="row mt-10">
        <div class="col-lg-6 col-md-12 mb-5">
            <div class="d-flex flex-wrap flex-sm-nowrap">
                <div class="me-7">
                    <div class="symbol symbol-100px symbol-lg-150px symbol-fixed position-relative">
                        <img id="imageLogoUtama" src="{{ asset('assets/media/avatars/logo-none.jpg') }}" alt="image">
                    </div>
                </div>

                <div class="flex-grow-1">
                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                        <div class="d-flex flex-column">
                            <div class="d-flex align-items-center mb-2">
                                <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">Logo
                                    Utama</a>
                            </div>
                            <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                <input type="file" class="form-control" name="logoUtama" id="logoUtama"
                                    accept=".jpg, .jpeg, .png">
                                <span class="logoUtama text-danger fs-7 mt-2"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 mb-5">
            <div class="d-flex flex-wrap flex-sm-nowrap">
                <div class="me-7">
                    <div class="symbol symbol-100px symbol-lg-150px symbol-fixed position-relative">
                        <img id="imageHeaderLogo" src="{{ asset('assets/media/avatars/logo-none.jpg') }}"
                            alt="image">
                    </div>
                </div>

                <div class="flex-grow-1">
                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                        <div class="d-flex flex-column">
                            <div class="d-flex align-items-center mb-2">
                                <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">
                                    Header Logo
                                </a>
                            </div>
                            <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                <input type="file" class="form-control" name="headerLogo" id="headerLogo"
                                    accept=".jpg, .jpeg, .png">
                                <span class="headerLogo text-danger fs-7 mt-2"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 mb-5">
            <div class="d-flex flex-wrap flex-sm-nowrap">
                <div class="me-7">
                    <div class="symbol symbol-100px symbol-lg-150px symbol-fixed position-relative">
                        <img id="imageComponentLogo" src="{{ asset('assets/media/avatars/logo-none.jpg') }}"
                            alt="image">
                    </div>
                </div>

                <div class="flex-grow-1">
                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                        <div class="d-flex flex-column">
                            <div class="d-flex align-items-center mb-2">
                                <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">Component
                                    Logo</a>
                            </div>
                            <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                <input type="file" class="form-control" name="componentLogo" id="componentLogo"
                                    accept=".jpg, .jpeg, .png">
                                <span class="componentLogo text-danger fs-7 mt-2"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 mt-10 text-end">
            <button type="submit" id="submitFormSettingLogo" class="btn btn-primary me-10">
                <span class="indicator-label">
                    Update
                </span>
                <span class="indicator-progress">
                    Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                </span>
            </button>
        </div>
    </div>
</form>


@push('custom-scripts')
    <script>
        $(document).ready(function() {
            validateFileInput(
                '#logoUtama',
                '#imageLogoUtama',
                '.logoUtama',
                /\.(jpg|jpeg|png)$/i,
                2 * 1024 * 1024
            );

            validateFileInput(
                '#headerLogo',
                '#imageHeaderLogo',
                '.headerLogo',
                /\.(jpg|jpeg|png)$/i,
                5 * 1024 * 1024
            );

            validateFileInput(
                '#componentLogo',
                '#imageComponentLogo',
                '.componentLogo',
                /\.(jpg|jpeg|png)$/i,
                2 * 1024 * 1024
            );

            $('#formSettingLogo').on('submit', function() {
                var button = document.querySelector("#submitFormSettingLogo");
                button.setAttribute("data-kt-indicator", "on");
                button.disabled = true;
            });
        });
    </script>
@endpush
