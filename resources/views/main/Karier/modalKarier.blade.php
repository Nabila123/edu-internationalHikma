<div class="modal fade" id="modalFilter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-right" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="get" action="">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="keyword">Cari</label>
                        <input type="text" class="form-control" id="keyword" name="keyword"
                            value="{{ isset($keyword) ? $keyword : null }}" placeholder="Masukkan Keyword">
                    </div>

                    <div class="form-group">
                        <label for="keyword">Kategori</label>
                        <select class="custom-select">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="keyword">Jenis Pekerjaan</label>
                        <select class="custom-select">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <a href="{{ route('karier') }}" class="btn btn-secondary btn-sm text-white fs-4">Reset</a>
                    <button type="button" class="btn btn-primary btn-sm fs-4">Proses</button>
                </div>
            </form>
        </div>
    </div>
</div>
