<div class="modal-body">
    <div class="row" id="edit-kelas">
        <div class="demo-vertical-spacing demo-only-element col-md-12 ">
            <div class="form-password-toggle">
                <label class="form-label" for="nip">NIP</label>
                <input type="text" value="{{ $guru->id }}" name="id" hidden>
                <input type="number" class="form-control" id="nip" name="nip"
                    aria-describedby="basic-default-password2" required value="{{ $guru->nip }}" />
                <span class="invalid-feedback alert-nip d-none" role="alert"></span>
            </div>
            <div class="form-password-toggle">
                <label class="form-label" for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama"
                    aria-describedby="basic-default-password2" required value="{{ $guru->nama }}" />
                <span class="invalid-feedback alert-nama d-none" role="alert"></span>
            </div>
            <div class="form-password-toggle">
                <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                <div class="">
                    @if ($guru->jenis_kelamin == 'Laki-laki')
                        <input name="jenis_kelamin" class="form-check-input jenis_kelamin" type="radio" value="Laki-laki"
                            id="Laki-laki" checked />
                        <label class="form-check-label" for="Laki-laki">
                            Laki-laki
                        </label>

                        <input name="jenis_kelamin" class="form-check-input jenis_kelamin" type="radio" value="Perempuan"
                            id="Perempuan" />
                        <label class="form-check-label" for="Perempuan">
                            Perempuan
                        </label>
                    @else
                        <input name="jenis_kelamin" class="form-check-input jenis_kelamin" type="radio" value="Laki-laki"
                            id="Laki-laki" />
                        <label class="form-check-label" for="Laki-laki">
                            Laki-laki
                        </label>

                        <input name="jenis_kelamin" class="form-check-input jenis_kelamin" type="radio" value="Perempuan"
                            id="Perempuan" checked />
                        <label class="form-check-label" for="Perempuan">
                            Perempuan
                        </label>
                    @endif
                    <span class="invalid-feedback alert-jenis_kelamin d-none" role="alert"></span>
                </div>
            </div>
            <div class="form-password-toggle">
                <label class="form-label" for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                    aria-describedby="basic-default-password2" required value="{{ $guru->tanggal_lahir }}" />
                <span class="invalid-feedback alert-tanggal_lahir d-none" role="alert"></span>
            </div>
            <div class="form-password-toggle">
                <label class="form-label" for="alamat">alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" required>{{ $guru->alamat }}</textarea>
                <span class="invalid-feedback alert-alamat d-none" role="alert"></span>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button class="btn btn-primary" onclick="update({{ $guru->id }})">Save
        changes</button>
</div>
