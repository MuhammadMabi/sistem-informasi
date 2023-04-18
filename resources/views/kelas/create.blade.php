<div class="modal-body">
    <div class="row">
        <div class="demo-vertical-spacing demo-only-element col-md-12 ">
            <div class="form-password-toggle">
                <label class="form-label" for="kelas">Kelas</label>
                <input type="text" class="form-control" id="kelas"
                    name="kelas" aria-describedby="basic-default-password2" required />
                <span class="invalid-feedback alert-kelas d-none" role="alert"></span>
            </div>
            <div class="form-password-toggle">
                <label class="form-label" for="guru_id">Wali Kelas</label>
                <select class="form-select" id="guru_id" required
                    name="guru_id">
                    <option value="">Pilih Wali Kelas</option>
                    @foreach ($guru as $g)
                        <option value="{{ $g->id }}">{{ $g->nama }}</option>
                    @endforeach
                </select>
                <span class="invalid-feedback alert-guru_id d-none" id="alert-kelas" role="alert"></span>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary" onclick="store()">Save changes</button>
</div>
