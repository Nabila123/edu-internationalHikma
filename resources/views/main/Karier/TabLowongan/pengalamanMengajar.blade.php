<div id="pengalamanMengajar" class="border p-5">
    <div class="form-group row mb-5">
        <div class="col-lg-6">
            <h4 class="ls-1">Pengalaman Mengajar</h4>
        </div>
        <div class="col-lg-6 text-right">
            <a href="javascript:;" data-repeater-create class="btn btn-sm btn-primary">
                <i class="fa-solid fa-plus fs-3"></i>
                Tambah
            </a>
        </div>
    </div>

    <div class="form-group border-bottom p-2">
        <div data-repeater-list="pengalamanMengajar">
            <div data-repeater-item>
                <div class="form-group border-top pt-2 row">
                    <div class="col-lg-6 mb-3">
                        <label class="text-dark fw-bold fs-4 required">Organisasi</label>
                        <input id="pMengajarOrganisasi" name="pMengajarOrganisasi" type="text"
                            value="{{ old('pMengajarOrganisasi') }}" class="form-control"
                            placeholder="Masukkan Organisasi" required>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label class="text-dark fw-bold fs-4 required">Posisi</label>
                        <input id="pMengajarPosisi" name="pMengajarPosisi" type="text"
                            value="{{ old('pMengajarPosisi') }}" class="form-control" placeholder="Masukkan Posisi"
                            required>
                    </div>

                    <div class="col-lg-6 mb-3">
                        <label class="text-dark fw-bold fs-4 required">Tahun Masuk</label>
                        <input id="pMengajarTahunMasuk" name="pMengajarTahunMasuk" type="text"
                            value="{{ old('pMengajarTahunMasuk') }}" class="form-control"
                            placeholder="Masukkan Tahun Masuk" required>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label class="text-dark fw-bold fs-4 required">Tahun Keluar</label>
                        <input id="pMengajarTahunKeluar" name="pMengajarTahunKeluar" type="text"
                            value="{{ old('pMengajarTahunKeluar') }}" class="form-control"
                            placeholder="Masukkan Tahun Keluar" required>
                    </div>

                    <div class="col-lg-12 mb-3">
                        <label class="text-dark fw-bold fs-4 required">Deskripsi</label>
                        <textarea id="pMengajarDeskripsi" name="pMengajarDeskripsi" class="form-control" placeholder="Masukkan Deskripsi"
                            data-kt-autosize="true" required>{{ old('pMengajarDeskripsi') }}</textarea>
                    </div>

                    <div class="col-lg-12">
                        <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-danger text-white mt-3">
                            <i class="fa-solid fa-trash fs-5"></i>
                            Hapus
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('custom-scripts')
    <script>
        $(document).ready(function() {
            $('#pengalamanMengajar').repeater({
                initEmpty: false,

                defaultValues: {
                    'text-input': 'foo'
                },

                show: function() {
                    $(this).slideDown();
                },

                hide: function(deleteElement) {
                    $(this).slideUp(deleteElement);
                }
            });

            Inputmask({
                "mask": "9,9",
                "placeholder": "_,_",
            }).mask("#pMengajarIPK");

            Inputmask({
                "mask": "9999",
                "placeholder": "___",
            }).mask("#pMengajarTahunMasuk, #pMengajarTahunKeluar");
        });
    </script>
@endpush