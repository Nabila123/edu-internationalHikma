<div class="row border p-3">
    <div class="col-lg-12 border-bottom pb-2 mb-5">
        <h4 class="ls-1">
            Hafalan
            <sup class="fs-5">( Jika Ada )</sup>
        </h4>
    </div>

    <div class="col-lg-6 mb-3">
        <label class="text-dark fw-bold fs-4">Lembaga Qur'an</label>
        <input id="hflLembaga" name="hflLembaga" type="text" value="{{ old('hflLembaga') }}" class="form-control"
            placeholder="Masukkan Lembaga Qur'an">
    </div>
    <div class="col-lg-6 mb-3">
        <label class="text-dark fw-bold fs-4">Jumlah Hafalan </label>
        <div class="input-group">
            <input id="hflJumlahHafalan" name="hflJumlahHafalan" type="text" value="{{ old('hflJumlahHafalan') }}"
                class="form-control" placeholder="Masukkan Jumlah Hafalan">
            <div class="input-group-append">
                <span class="input-group-text pl-4 pr-4 fs-3">Juz</span>
            </div>
        </div>
    </div>

    <div class="col-lg-6 mb-3">
        <label class="text-dark fw-bold fs-4">Juz</label>
        <div id="hafalanJuz">
            <div class="form-group">
                <div data-repeater-list="hafalanJuz">
                    <div data-repeater-item>
                        <div class="form-group row">
                            <div class="col-lg-9">
                                <input id="hflJuz" name="hflJuz" type="text" value="{{ old('hflJuz') }}"
                                    class="form-control" placeholder="Masukkan Hafalan Juz" required>
                            </div>
                            <div class="col-lg-3">
                                <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-danger text-white">
                                    <i class="fa-solid fa-trash fs-5"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group mb-5">
                <a href="javascript:;" data-repeater-create class="btn btn-sm btn-primary">
                    <i class="fa-solid fa-plus fs-3"></i>
                    Tambah
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-3">
        <label class="text-dark fw-bold fs-4">Diraih Dalam Waktu</label>
        <input id="hflKurunWaktu" name="hflKurunWaktu" type="text" value="{{ old('hflKurunWaktu') }}"
            class="form-control" placeholder="Masukkan Kurun Waktu">
    </div>
</div>

@push('custom-scripts')
    <script>
        $(document).ready(function() {
            Inputmask({
                "mask": "99",
                "placeholder": "__",
            }).mask("#hflJumlahHafalan");

            $('#hafalanJuz').repeater({
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
        });
    </script>
@endpush
