    <div class="modal-body">
        <div class="row">
            <div class="demo-vertical-spacing demo-only-element col-md-12 ">
                <div class="form-password-toggle">
                    <label class="form-label" for="nisn">NISN</label>
                    <input type="number" class="form-control @error('nisn') is-invalid @enderror" id="nisn"
                        name="nisn" aria-describedby="basic-default-password2" required />
                    <span class="invalid-feedback alert-nisn d-none" role="alert"></span>
                </div>
                <div class="form-password-toggle">
                    <label class="form-label" for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama"
                        aria-describedby="basic-default-password2" required />
                    <span class="invalid-feedback alert-nama d-none" role="alert"></span>
                </div>
                <div class="form-password-toggle">
                    <label class="form-label" for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                        aria-describedby="basic-default-password2" required />
                    <span class="invalid-feedback alert-tanggal_lahir d-none" role="alert"></span>
                </div>
                <div class="form-password-toggle">
                    <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                    <div class="">
                        <input name="jenis_kelamin" class="form-check-input jenis_kelamin" type="radio"
                            value="Laki-laki" id="Laki-laki" checked />
                        <label class="form-check-label" for="Laki-laki">
                            Laki-laki
                        </label>

                        <input name="jenis_kelamin" class="form-check-input jenis_kelamin" type="radio"
                            value="Perempuan" id="Perempuan" />
                        <label class="form-check-label" for="Perempuan">
                            Perempuan
                        </label>
                        <span class="invalid-feedback alert-jenis_kelamin d-none" role="alert"></span>
                    </div>
                </div>
                <div class="form-password-toggle">
                    <label class="form-label" for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" required></textarea>
                    <span class="invalid-feedback alert-alamat d-none" role="alert"></span>
                </div>
                <div class="form-password-toggle">
                    <label class="form-label" for="kelas">Kelas</label>
                    <select class="form-select" id="kelas_id" required name="kelas_id">
                        <option value="">Pilih Kelas</option>
                        @foreach ($kelas as $k)
                            <option value="{{ $k->id }}">{{ $k->kelas }}</option>
                        @endforeach
                        <option value="PSB">Penerimaan Siswa Baru (PSB)</option>
                    </select>
                    <span class="invalid-feedback alert-kelas_id d-none" role="alert"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" onclick="store()">Save changes</button>
    </div>
