@if ($sekolah == null)
    <div class="row">
        <div class="demo-vertical-spacing demo-only-element col-md-12 ">
            <div class="form-password-toggle">
                <label class="form-label" for="npsn">NPSN</label>
                <input type="number" class="form-control" id="npsn" name="npsn"
                    aria-describedby="basic-default-password2" required />
                <span class="invalid-feedback alert-npsn d-none" role="alert"></span>
            </div>
            <div class="form-password-toggle">
                <label class="form-label" for="nama">Nama Sekolah</label>
                <input type="text" class="form-control" id="nama" name="nama"
                    aria-describedby="basic-default-password2" required />
                <span class="invalid-feedback alert-nama d-none" role="alert"></span>
            </div>
        </div>
        <div class="form-password-toggle">
            <label class="form-label" for="status">Status</label>
            <select class="form-select" id="status" id="status" name="status">
                <option value="Negeri" selected>Negeri</option>
                <option value="Swasta">Swasta</option>
            </select>
            <span class="invalid-feedback alert-status d-none" role="alert"></span>
        </div>
        <div class="form-password-toggle">
            <label class="form-label" for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email"
                aria-describedby="basic-default-password2" required />
            <span class="invalid-feedback alert-email d-none" role="alert"></span>
        </div>
        <div class="form-password-toggle">
            <label class="form-label" for="no_telp">Nomor Telepon</label>
            <input type="number" class="form-control" id="no_telp" name="no_telp"
                aria-describedby="basic-default-password2" required />
            <span class="invalid-feedback alert-no_telp d-none" role="alert"></span>
        </div>
        <div class="form-password-toggle">
            <label class="form-label" for="alamat">alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" required></textarea>
            <span class="invalid-feedback alert-alamat d-none" role="alert"></span>
        </div>
    </div>
@else
    <input type="text" value="{{ $sekolah->id }}" name="id" id="id" hidden>
    <div class="row">
        <div class="demo-vertical-spacing demo-only-element col-md-12 ">
            <div class="form-password-toggle">
                <label class="form-label" for="npsn">NPSN</label>
                <input type="number" class="form-control" id="npsn" name="npsn"
                    aria-describedby="basic-default-password2" required value="{{ $sekolah->npsn }}" />
                <span class="invalid-feedback alert-npsn d-none" role="alert"></span>
            </div>
            <div class="form-password-toggle">
                <label class="form-label" for="nama">Nama Sekolah</label>
                <input type="text" class="form-control" id="nama" name="nama"
                    aria-describedby="basic-default-password2" required value="{{ $sekolah->nama }}" />
                <span class="invalid-feedback alert-nama d-none" role="alert"></span>
            </div>
            <div class="form-password-toggle">
                <label class="form-label" for="status">Status</label>
                <select class="form-select" id="status" name="status">
                    @if ($sekolah->status == 'Negeri')
                        <option value="Negeri" selected>Negeri</option>
                        <option value="Swasta">Swasta</option>
                    @elseif ($sekolah->status == 'Swasta')
                        <option value="Negeri">Negeri</option>
                        <option value="Swasta" selected>Swasta</option>
                    @else
                        <option value="">Pilih Status</option>
                        <option value="Negeri">Negeri</option>
                        <option value="Swasta">Swasta</option>
                    @endif
                </select>
                <span class="invalid-feedback alert-status d-none" role="alert"></span>
            </div>
            <div class="form-password-toggle">
                <label class="form-label" for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                    aria-describedby="basic-default-password2" required value="{{ $sekolah->email }}" />
                <span class="invalid-feedback alert-email d-none" role="alert"></span>
            </div>
            <div class="form-password-toggle">
                <label class="form-label" for="no_telp">Nomor Telepon</label>
                <input type="number" class="form-control" id="no_telp" name="no_telp"
                    aria-describedby="basic-default-password2" required value="{{ $sekolah->no_telp }}" />
                <span class="invalid-feedback alert-no_telp d-none" role="alert"></span>
            </div>
            <div class="form-password-toggle">
                <label class="form-label" for="alamat">alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" required>{{ $sekolah->alamat }}</textarea>
                <span class="invalid-feedback alert-alamat d-none" role="alert"></span>
            </div>
        </div>
    </div>
@endif
<div class="mt-3">
    <button type="submit" class="btn btn-primary" onclick="store()">Save changes</button>
</div>
