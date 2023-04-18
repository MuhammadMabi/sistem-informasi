<div class="modal-body">
    <div class="row" id="edit-kelas">
        <div class="demo-vertical-spacing demo-only-element col-md-12 ">
            <div class="form-password-toggle">
                <label class="form-label" for="kelas">Kelas</label>
                <input type="text" name="id" id="id-kelas-edit" hidden>
                <input type="text" class="form-control" id="kelas"
                    name="kelas" aria-describedby="basic-default-password2" value="{{ $kelas->kelas }}" required />
                <span class="invalid-feedback alert-kelas d-none" role="alert"></span>
            </div>
            <div class="form-password-toggle">
                <label class="form-label" for="guru_id">Wali Kelas</label>
                <select class="form-select" required name="guru_id"
                    id="guru_id">
                    @foreach ($guru as $g)
                        @if ($g->id == $kelas->guru_id)
                            <option selected value="{{ $kelas->guru_id }}">{{ $kelas->guru->nama }}
                            </option>
                        @endif
                        <option value="{{ $g->id }}">{{ $g->nama }}
                        </option>
                    @endforeach
                </select>
                <span class="invalid-feedback alert-guru_id d-none" role="alert"></span>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary" onclick="update({{ $kelas->id }})">Save
        changes</button>
</div>
