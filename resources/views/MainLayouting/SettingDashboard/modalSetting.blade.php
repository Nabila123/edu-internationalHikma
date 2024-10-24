<div class="modal fade" id="modalCaraosel" tabindex="-1" aria-hidden="true" data-bs-backdrop="static"
    data-bs-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h3 class="modal-title text-white titleModalCaraosel"></h3>
                <div class="btn btn-icon btn-sm btn-light-dark ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
            </div>
            <form id="formModalCaraosel" method="POST" action="#" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 mb-5">
                            <div class="form-group">
                                <label class=" fw-bolder fs-6 mb-2">Judul</label>
                                <input name="judul" id="judul" type="text"
                                    class="form-control @error('judul') is-invalid @enderror mb-3 mb-lg-0"
                                    value="{{ old('judul') }}" placeholder="Masukkan Judul">
                                @error('judul')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 mb-5">
                            <div class="form-group">
                                <label class=" fw-bolder fs-6 mb-2">Slogan</label>
                                <input name="slogan" id="slogan" type="text"
                                    class="form-control @error('slogan') is-invalid @enderror mb-3 mb-lg-0"
                                    value="{{ old('slogan') }}" placeholder="Masukkan Slogan">
                                @error('slogan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-5">
                            <div class="form-group">
                                <label class=" fw-bolder fs-6 mb-2">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control" data-kt-autosize="true" placeholder="Masukkan Deskripsi"></textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mb-5">
                            <div class="form-group">
                                <label class=" fw-bolder fs-6 mb-2">Status</label>
                                <select id="isActiveCaraosel" name="isActive" class="form-select" data-control="select2"
                                    data-placeholder="Pilih Satu" required>
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 mb-5">
                            <label for="exampleFormControlInput1" class="required form-label fw-bolder">Image
                                Caraosel</label>
                            <div class="dropzone">
                                <div id="dropzonePreview">
                                    <input type="file" class="form-control" id="imageCaraosel" name="imageCaraosel"
                                        accept=".jpg,.jpeg,.png">
                                    <div class="imageCaraosel text-danger fs-8 mt-5"></div>
                                </div>
                            </div>
                            <div class="symbol symbol-100px symbol-lg-150px symbol-fixed position-relative mt-5">
                                <img id="imagePreviewCaraosel" class="d-none" src="#" alt="image">
                            </div>
                        </div>

                    </div>
                    <br>
                </div>
                <div class="modal-footer text-end">
                    <button type="submit" class="btn btn-primary me-10">
                        <span class="indicator-label">
                            Simpan
                        </span>
                        <span class="indicator-progress">
                            Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalLogos" tabindex="-1" aria-hidden="true" data-bs-backdrop="static"
    data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h3 class="modal-title text-white titleModalLogos"></h3>
                <div class="btn btn-icon btn-sm btn-light-dark ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
            </div>
            <form id="formModalLogos" method="POST" action="#" enctype="multipart/form-data">
                <span class="indicator-label">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 text-center mb-5">
                                <div class="symbol symbol-100px symbol-lg-150px symbol-fixed position-relative">
                                    <img id="imagePreview" src="#" alt="image">
                                </div>
                            </div>
                            <div class="col-md-12 mb-5">
                                <div class="form-group">
                                    <label class="required fw-bolder fs-6 mb-2">Upload Logo</label>
                                    <input type="file" class="form-control" name="imageLogo" id="imageLogo"
                                        accept=".jpg, .jpeg, .png">
                                    <span class="imageLogo text-danger fs-7 mt-2"></span>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="modal-footer text-end">
                        <button type="submit" class="btn btn-primary me-10">
                            <span class="indicator-label">
                                Simpan
                            </span>
                            <span class="indicator-progress">
                                Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                </span>
                <span class="indicator-progress p-5">
                    Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                </span>
            </form>
        </div>
    </div>
</div>

{{-- <div class="modal fade" id="modalHeader" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle"
    aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h3 class="modal-title text-white"></h3>
                <div class="btn btn-icon btn-sm btn-light-dark ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
            </div>
            <form id="formModalHeader" method="POST" action="#">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-5">
                            <div class="form-group">
                                <label class="required fw-bolder fs-6 mb-2">Judul</label>
                                <input name="judul" id="judul" type="text"
                                    class="form-control @error('judul') is-invalid @enderror mb-3 mb-lg-0"
                                    value="{{ old('judul') }}" placeholder="Masukkan Judul" required>
                                @error('judul')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-5">
                            <div class="form-group">
                                <label class="required fw-bolder fs-6 mb-2">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control" data-kt-autosize="true"
                                    placeholder="Masukkan Deskripsi" required></textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary me-10">
                        <span class="indicator-label">
                            Simpan
                        </span>
                        <span class="indicator-progress">
                            Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div> --}}

<div class="modal fade" tabindex="-1" role="dialog" id="modalDelete">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h3 class="modal-title text-white"></h3>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>
            <form method="post" action="#" id="formModalDelete">
                @method('delete')
                @csrf
                <div class="modal-body">
                    <p>Apakah Anda yakin akan menghapus data ini?</p>
                </div>
                <div class="modal-footer" style="justify-content: center;">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    &nbsp;
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('custom-scripts')
    <script>
        $(document).ready(function() {
            validateFileInput(
                '#imageLogo',
                '#imagePreview',
                '.imageLogo',
                /\.(jpg|jpeg|png)$/i,
                2 * 1024 * 1024
            );

            validateFileInput(
                '#imageCaraosel',
                '#imagePreviewCaraosel',
                '.imageCaraosel',
                /\.(jpg|jpeg|png)$/i,
                5 * 1024 * 1024
            );
        });
    </script>
@endpush
