<div id="Pendidikan" class="border p-5">
    <div class="form-group row mb-5">
        <div class="col-lg-6">
            <h4 class="ls-1">Pendidikan</h4>
        </div>
        <div class="col-lg-6 text-right">
            <a href="javascript:;" data-repeater-create class="btn btn-sm btn-primary">
                <i class="fa-solid fa-plus fs-3"></i>
                Tambah
            </a>
        </div>
    </div>

    <div class="form-group border-bottom p-2">
        <div data-repeater-list="Pendidikan">
            <div data-repeater-item>
                <div class="form-group border-top pt-2 row">
                    <div class="col-lg-6 mb-3">
                        <label class="text-dark fw-bold fs-4 required">Universitas</label>
                        <input id="pendUniv" name="pendUniv" type="text" value="{{ old('pendUniv') }}"
                            class="form-control" placeholder="Masukkan Universitas" required>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label class="text-dark fw-bold fs-4 required">Fakultas</label>
                        <input id="pendFakultas" name="pendFakultas" type="text" value="{{ old('pendFakultas') }}"
                            class="form-control" placeholder="Masukkan Fakultas" required>
                    </div>

                    <div class="col-lg-3 mb-3">
                        <label class="text-dark fw-bold fs-4 required">IPK</label>
                        <input id="pendIPK" name="pendIPK" type="text" value="{{ old('pendIPK') }}"
                            class="form-control" placeholder="Masukkan IPK" required>
                    </div>
                    <div class="col-lg-3 mb-3">
                        <label class="text-dark fw-bold fs-4 required">Jenjang</label>
                        <select id="pendJenjang" name="pendJenjang" class="custom-select">
                            <option selected>Pilih Salah Satu</option>
                            <option value="D3">D3</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                        </select>
                    </div>
                    <div class="col-lg-3 mb-3">
                        <label class="text-dark fw-bold fs-4 required">Tahun Masuk</label>
                        <input id="pendTahunMasuk" name="pendTahunMasuk" type="text"
                            value="{{ old('pendTahunMasuk') }}" class="form-control" placeholder="Masukkan Tahun Masuk"
                            required>
                    </div>
                    <div class="col-lg-3 mb-3">
                        <label class="text-dark fw-bold fs-4 required">Tahun Lulus</label>
                        <input id="pendTahunLulus" name="pendTahunLulus" type="text"
                            value="{{ old('pendTahunLulus') }}" class="form-control" placeholder="Masukkan Tahun Lulus"
                            required>
                    </div>

                    <div class="col-lg-12 mb-3">
                        <label class="text-dark fw-bold fs-4 required">Prestasi</label>
                        <textarea id="pendPrestasi" name="pendPrestasi" class="form-control" placeholder="Masukkan Prestasi"
                            data-kt-autosize="true" required>{{ old('pendPrestasi') }}</textarea>
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
            $('#Pendidikan').repeater({
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
            }).mask("#pendIPK");

            Inputmask({
                "mask": "9999",
                "placeholder": "___",
            }).mask("#pendTahunMasuk, #pendTahunLulus");
        });
    </script>
@endpush
