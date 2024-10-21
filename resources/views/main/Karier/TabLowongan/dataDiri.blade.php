<div class="row border p-3">
    <div class="col-lg-12 border-bottom pb-2 mb-5">
        <h4 class="ls-1">Data Diri</h4>
    </div>
    <div class="col-lg-6 mb-3">
        <label class="text-dark fw-bold fs-4 required">Nama Lengkap</label>
        <input id="ddNmLengkap" name="ddNmLengkap" type="text" value="{{ old('ddNmLengkap') }}" class="form-control"
            placeholder="Masukkan Nama Lengkap" required>
    </div>
    <div class="col-lg-6 mb-3">
        <label class="text-dark fw-bold fs-4 required">Nama Panggilan</label>
        <input id="ddNmPanggilan" name="ddNmPanggilan" type="text" value="{{ old('ddNmPanggilan') }}"
            class="form-control" placeholder="Masukkan Nama Panggilan" required>
    </div>

    <div class="col-lg-6 mb-3">
        <label class="text-dark fw-bold fs-4 required">No HP / Whatsapp</label>
        <input id="ddNoHp" name="ddNoHp" type="text" value="{{ old('ddNoHp') }}" class="form-control"
            placeholder="Masukkan No HP / Whatsapp" required>
    </div>
    <div class="col-lg-6 mb-3">
        <label class="text-dark fw-bold fs-4 required">Email</label>
        <input id="ddEmail" name="ddEmail" type="email" value="{{ old('ddEmail') }}" class="form-control"
            placeholder="Masukkan Email" required>
    </div>

    <div class="col-lg-4 mb-3">
        <label class="text-dark fw-bold fs-4 required">Jenis Kelamin</label>
        <select id="ddJnsKel" name="ddJnsKel" class="custom-select">
            <option selected>Pilih Salah Satu</option>
            <option value="L">Laki - Laki</option>
            <option value="P">Perempuan</option>
        </select>
    </div>
    <div class="col-lg-4 mb-3">
        <label class="text-dark fw-bold fs-4 required">Status Perkawinan</label>
        <select id="ddStsKawin" name="ddStsKawin" class="custom-select">
            <option selected>Pilih Salah Satu</option>
            <option value="M">Menikah</option>
            <option value="BM">Belum menikah</option>
        </select>
    </div>
    <div class="col-lg-4 mb-3">
        <label class="text-dark fw-bold fs-4">Jumlah Anak</label>
        <div class="input-group">
            <input id="ddAnak" name="ddAnak" type="text" value="{{ old('ddAnak') }}" class="form-control"
                placeholder="Masukkan Jumlah Anak">
            <div class="input-group-append">
                <span class="input-group-text fs-4">Anak</span>
            </div>
        </div>
    </div>

    <div class="col-lg-4 mb-3">
        <label class="text-dark fw-bold fs-4 required">Tempat Lahir</label>
        <input id="ddTmpLahir" name="ddTmpLahir" type="text" value="{{ old('ddTmpLahir') }}" class="form-control"
            placeholder="Masukkan Tempat Lahir" required>
    </div>
    <div class="col-lg-4 mb-3">
        <label class="text-dark fw-bold fs-4 required">Tanggal Lahir</label>
        <input id="ddTglLahir" name="ddTglLahir" type="text" value="{{ old('ddTglLahir') }}" class="form-control"
            placeholder="Masukkan Tanggal Lahir" required>
    </div>
    <div class="col-lg-4 mb-3">
        <label class="text-dark fw-bold fs-4">Hobi</label>
        <input id="ddHobi" name="ddHobi" type="text" value="{{ old('ddHobi') }}" class="form-control"
            placeholder="Masukkan Hobi">
    </div>

    <div class="col-lg-12 mb-3">
        <label class="text-dark fw-bold fs-4 required">Alamat</label>
        <textarea id="ddAlamat" name="ddAlamat" class="form-control" placeholder="Masukkan Alamat" data-kt-autosize="true"
            required>{{ old('ddAlamat') }}</textarea>
    </div>

    <div class="col-lg-6 mb-3">
        <label class="text-dark fw-bold fs-4">Sosial Media</label>
        <div class="input-group mb-3">
            <div class="input-group-append">
                <span class="input-group-text pl-4 pr-4 ">
                    <i class="fa-brands fa-facebook-f fs-2"></i>
                </span>
            </div>
            <input id="ddSosFacebook" name="ddSosFacebook" type="text" value="{{ old('ddSosFacebook') }}"
                class="form-control" placeholder="Masukkan Facebook">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-append">
                <span class="input-group-text pl-4 pr-4 ">
                    <i class="fa-brands fa-instagram fs-3"></i>
                </span>
            </div>
            <input id="ddSosInstagram" name="ddSosInstagram" type="text" value="{{ old('ddSosInstagram') }}"
                class="form-control" placeholder="Masukkan Instagram">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-append">
                <span class="input-group-text pl-4 pr-4 ">
                    <i class="fa-brands fa-x-twitter fs-3"></i>
                </span>
            </div>
            <input id="ddSosTwitter" name="ddSosTwitter" type="text" value="{{ old('ddSosTwitter') }}"
                class="form-control" placeholder="Masukkan Twitter">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-append">
                <span class="input-group-text pl-4 pr-4 ">
                    <i class="fa-brands fa-tiktok fs-2"></i>
                </span>
            </div>
            <input id="ddSosTiktok" name="ddSosTiktok" type="text" value="{{ old('ddSosTiktok') }}"
                class="form-control" placeholder="Masukkan Tiktok">
        </div>
    </div>

    <div class="col-lg-6 mb-3">
        <label class="text-dark fw-bold fs-4 required">Foto Diri</label>
        <input id="ddImage" name="ddImage" type="file" class="form-control" placeholder="Masukkan Foto"
            accept=".jpg, .jpeg, .png" required>
        <span class="ddImage text-danger fw-bold fs-6"></span>
        <img id="imagePreview" src="#" alt="Preview Foto" class="d-none w-140px h-auto">
    </div>
</div>

@push('custom-scripts')
    <script>
        $(document).ready(function() {
            Inputmask({
                "mask": "999-999-999-9999",
                "placeholder": "___-___-___-____",
            }).mask("#ddNoHp");

            Inputmask({
                "mask": "999",
                "placeholder": "___",
            }).mask("#ddAnak");

            Inputmask({
                mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[.*{2,6}][.*{1,2}]",
                greedy: false,
                onBeforePaste: function(pastedValue, opts) {
                    pastedValue = pastedValue.toLowerCase();
                    return pastedValue.replace("mailto:", "");
                },
                definitions: {
                    "*": {
                        validator: '[0-9A-Za-z!#$%&"*+/=?^_`{|}~\-]',
                        cardinality: 1,
                        casing: "lower"
                    }
                }
            }).mask("#ddEmail");

            $("#ddTglLahir").flatpickr({
                altInput: true,
                altFormat: "j F Y",
                dateFormat: "Y-m-d"
            });

            validateFileInput('#ddImage', '#imagePreview', '.ddImage', /\.(jpg|jpeg|png)$/i, 2 * 1024 * 1024);
        });
    </script>
@endpush
