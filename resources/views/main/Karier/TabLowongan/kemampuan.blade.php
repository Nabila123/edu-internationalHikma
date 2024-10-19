<div class="row border p-3">
    <div class="col-lg-12 border-bottom pb-2 mb-5">
        <h4 class="ls-1">Kemampuan Bahasa Inggris</h4>
    </div>

    <div class="col-lg-6 mb-3">
        <label class="text-dark fw-bold fs-4 required">Reading</label>
        <div class="d-flex flex-row">
            <div class="d-flex form-check align-items-center mr-5">
                <input class="form-check-input pr-2" type="radio" name="kmpReading" value="Beginner">
                <label class="form-check-label pl-2">
                    Beginner
                </label>
            </div>
            <div class="d-flex form-check align-items-center mr-5">
                <input class="form-check-input pr-2" type="radio" name="kmpReading" value="Intermediate">
                <label class="form-check-label pl-2">
                    Intermediate
                </label>
            </div>
            <div class="d-flex form-check align-items-center mr-5">
                <input class="form-check-input pr-2" type="radio" name="kmpReading" value="Advance">
                <label class="form-check-label pl-2">
                    Advance
                </label>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-3">
        <label class="text-dark fw-bold fs-4 required">Listening</label>
        <div class="d-flex flex-row">
            <div class="d-flex form-check align-items-center mr-5">
                <input class="form-check-input pr-2" type="radio" name="kmpListening" value="Beginner">
                <label class="form-check-label pl-2">
                    Beginner
                </label>
            </div>
            <div class="d-flex form-check align-items-center mr-5">
                <input class="form-check-input pr-2" type="radio" name="kmpListening" value="Intermediate">
                <label class="form-check-label pl-2">
                    Intermediate
                </label>
            </div>
            <div class="d-flex form-check align-items-center mr-5">
                <input class="form-check-input pr-2" type="radio" name="kmpListening" value="Advance">
                <label class="form-check-label pl-2">
                    Advance
                </label>
            </div>
        </div>
    </div>

    <div class="col-lg-6 mb-3">
        <label class="text-dark fw-bold fs-4 required">Writing</label>
        <div class="d-flex flex-row">
            <div class="d-flex form-check align-items-center mr-5">
                <input class="form-check-input pr-2" type="radio" name="kmpWriting" value="Beginner">
                <label class="form-check-label pl-2">
                    Beginner
                </label>
            </div>
            <div class="d-flex form-check align-items-center mr-5">
                <input class="form-check-input pr-2" type="radio" name="kmpWriting" value="Intermediate">
                <label class="form-check-label pl-2">
                    Intermediate
                </label>
            </div>
            <div class="d-flex form-check align-items-center mr-5">
                <input class="form-check-input pr-2" type="radio" name="kmpWriting" value="Advance">
                <label class="form-check-label pl-2">
                    Advance
                </label>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-3">
        <label class="text-dark fw-bold fs-4 required">Speaking</label>
        <div class="d-flex flex-row">
            <div class="d-flex form-check align-items-center mr-5">
                <input class="form-check-input pr-2" type="radio" name="kmpSpeaking" value="Beginner">
                <label class="form-check-label pl-2">
                    Beginner
                </label>
            </div>
            <div class="d-flex form-check align-items-center mr-5">
                <input class="form-check-input pr-2" type="radio" name="kmpSpeaking" value="Intermediate">
                <label class="form-check-label pl-2">
                    Intermediate
                </label>
            </div>
            <div class="d-flex form-check align-items-center mr-5">
                <input class="form-check-input pr-2" type="radio" name="kmpSpeaking" value="Advance">
                <label class="form-check-label pl-2">
                    Advance
                </label>
            </div>
        </div>
    </div>

    <div class="col-lg-12 mb-3">
        <label class="text-dark fw-bold fs-4 required">Tes Yang Pernah Diambil</label>
        <div id="kemampuanTes">
            <div class="form-group">
                <div data-repeater-list="kemampuanTes">
                    <div data-repeater-item>
                        <div class="form-group row">
                            <div class="col-lg-5">
                                <input id="kmpTes" name="kmpTes" type="text" value="{{ old('kmpTes') }}"
                                    class="form-control" placeholder="Masukkan Nama Tes" required>
                            </div>
                            <div class="col-lg-3">
                                <input id="kmpSkor" name="kmpSkor" type="text" value="{{ old('kmpSkor') }}"
                                    class="form-control" placeholder="Masukkan Skor" required>
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
</div>

@push('custom-scripts')
    <script>
        $(document).ready(function() {
            $('#kemampuanTes').repeater({
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
