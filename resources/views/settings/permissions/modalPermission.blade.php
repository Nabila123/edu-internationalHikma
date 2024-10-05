<div class="modal fade modal-md" id="modalShow" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle"
    aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h3 class="modal-title text-white"></h3>
                <div class="btn btn-icon btn-sm btn-light-dark ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('/permissions') }}" class="needs-validation" novalidate="">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-5">
                            <div class="form-group">
                                <label class="required fw-semibold fs-6 mb-2">Nama</label>
                                <input name="name" id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror mb-3 mb-lg-0"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-5">
                            <div class="form-group">
                                <label class="required fw-semibold fs-6 mb-2">Guard Name</label>
                                <input name="guard_name" id="guard_name" type="text"
                                    class="form-control  @error('guard_name') is-invalid @enderror mb-3 mb-lg-0"
                                    value="{{ old('guard_name') }}">
                                @error('guard_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="text-center hidden_button">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        &nbsp;
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="data-modal-delete">
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
            <form method="post" action="#">
                @method('delete')
                @csrf
                <div class="modal-body">
                    <p>Apakah Anda yakin akan menghapus data ini?</p>
                </div>
                <div class="modal-footer" style="justify-content: end;">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    &nbsp;
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
