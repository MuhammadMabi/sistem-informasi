@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings - Account')

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Profile</h5>
                <hr class="my-0">
                <div class="card-body">
                    <form action="{{ route('update-profile') }}" method="post">
                        @csrf
                        @method('put')

                        <input type="text" name="id" id="id" value="{{ $akun->id }}" hidden>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="nisn" class="form-label">NISN</label>
                                <input type="number" class="form-control @error('nisn') is-invalid @enderror"
                                    id="nisn" name="nisn" value="{{ $akun->siswa->nisn }}"
                                    placeholder="Enter your nisn" required autofocus>
                                @error('nisn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="{{ $akun->nama }}" placeholder="Enter your nama" required autofocus>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ $akun->email }}" placeholder="Enter your email"
                                    required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                                <div class="">
                                    @if ($akun->jenis_kelamin == 'Laki-laki')
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
                                    @else
                                        <input name="jenis_kelamin" class="form-check-input jenis_kelamin" type="radio"
                                            value="Laki-laki" id="Laki-laki" />
                                        <label class="form-check-label" for="Laki-laki">
                                            Laki-laki
                                        </label>

                                        <input name="jenis_kelamin" class="form-check-input jenis_kelamin" type="radio"
                                            value="Perempuan" id="Perempuan" checked />
                                        <label class="form-check-label" for="Perempuan">
                                            Perempuan
                                        </label>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                    value="{{ $akun->tanggal_lahir }}" placeholder="Enter your tanggal_lahir" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat"
                                    value="{{ $akun->alamat }}" placeholder="Enter your alamat" required>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button class="btn btn-primary me-2" type="submit">Save
                                changes</button>
                            <a href="/dashboard"><button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Back</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
