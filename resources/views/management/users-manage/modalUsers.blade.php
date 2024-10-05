<div class="modal fade" tabindex="-1" id="modalUser" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h3 class="modal-title text-white titleModalUser"></h3>
                <div class="btn btn-icon btn-sm btn-light-primary btn-active-light-dark ms-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
            </div>

            <form id="formModalUser" method="POST" action="#">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-group">
                                <label class="required fw-semibold fs-6 mb-2">Role User</label>
                                {{ getSelectRoles('roleId', '', old('roleId'), '', 'required') }}
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-group">
                                <label class="required fw-semibold fs-6 mb-2">Nama Lengkap</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}"
                                    class="form-control @error('name') is-invalid @enderror mb-3 mb-lg-0"
                                    placeholder="Masukkan Nama User" required>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-4" id="forUsername">
                            <div class="form-group">
                                <label class="required fw-semibold fs-6 mb-2">Username</label>
                                <input type="text" name="username" id="username" value="{{ old('username') }}"
                                    class="form-control @error('username') is-invalid @enderror mb-3 mb-lg-0"
                                    placeholder="Masukkan Username" required>
                                <div class="username"></div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4" id="forPassword">
                            <div class="form-group">
                                <label class="required fw-semibold fs-6 mb-2">Password</label>
                                <div class="input-group">
                                    <input type="password" name="password" id="password" value="{{ old('password') }}"
                                        class="form-control @error('password') is-invalid @enderror mb-3 mb-lg-0"
                                        placeholder="Masukkan Password" required>
                                    <button type="button" class="input-group-text" id="showPass">
                                        <i id="showPass-icon" class="ki-duotone ki-eye fs-1">
                                            <i class="path1"></i>
                                            <i class="path2"></i>
                                            <i class="path3"></i>
                                        </i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-group">
                                <label class="required fw-semibold fs-6 mb-2">Nomor WA</label>
                                <input type="text" name="noHp" id="noHp" value="{{ old('noHp') }}"
                                    class="form-control @error('noHp') is-invalid @enderror mb-3 mb-lg-0"
                                    placeholder="Masukkan Nomor WA" required>
                                <div class="noHp"></div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-group">
                                <label class=" fw-semibold fs-6 mb-2">Email</label>
                                <input name="email" id="email" type="email" value="{{ old('email') }}"
                                    class="form-control mb-3 mb-lg-0" placeholder="Masukkan Email">
                                <div class="email"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="btnModalUser" class="btn btn-primary">
                        <span class="indicator-label">
                            Simpan Data
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

<div class="modal fade" tabindex="-1" role="dialog" id="modalOther">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h3 class="modal-title text-white titleModalOther"></h3>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>
            <form method="post" action="#" id="formModalOther">
                @csrf
                <div class="modal-body">
                    <p class="bodyModalOther"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="btnModalOther" class="btn btn-primary">
                        <span class="indicator-label">
                            Proses
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#roleId').select2({
                dropdownParent: $('#modalUser')
            });

            Inputmask({
                "mask": "999 - 999 - 999 - 9999"
            }).mask("#noHp");

            $('#formModalUser').submit(function() {
                var button = document.querySelector("#btnModalUser");
                button.setAttribute("data-kt-indicator", "on");
                button.setAttribute("disabled", "disabled");
            });
        });
    </script>
@endpush
