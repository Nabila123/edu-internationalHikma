<div class="modal fade" tabindex="-1" role="dialog" id="modalBackupDelete">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h3 class="modal-title text-white"> Hapus Data Backup </h3>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i class="ki-duotone ki-cross text-dark fs-1"><span class="path1"></span><span
                            class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>
            <form id="formBackupKosDelete" method="post" action="#">
                @method('delete')
                @csrf
                <div class="modal-body">
                    <p>Apakah Anda yakin akan menghapus data ini?</p>
                </div>
                <div class="modal-footer" id="modalFooter">
                    <div style="text-align-last: right">
                        <div class="text-center">
                            <a class="btn btn-light" data-bs-dismiss="modal" aria-label="Close">
                                Kembali
                            </a>
                            <button type="submit" class="btn btn-danger">
                                <span class="indicator-label"> Submit </span>
                                <span class="indicator-progress"> Please wait... <span
                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
