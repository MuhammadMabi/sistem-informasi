@extends('layouts/blankLayout')

@section('title', 'Register Basic - Pages')

@section('page-style')
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}">
@endsection


@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">

                <div class="col-md-6 col-lg-12 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <!-- Logo -->
                            <div class="app-brand justify-content-center">
                                <a href="{{ url('/') }}" class="app-brand-link gap-2">
                                    <span
                                        class="app-brand-text demo text-body fw-bolder">Sign Up</span>
                                </a>
                            </div>
                            <div class="content-header">
                                <div class="container-fluid">
                                    @if (session('message'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ session('message') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <form id="formAuthentication" class="mb-3" action="{{ route('post-register') }}"
                                method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="nisn" class="form-label">NISN</label>
                                    <input type="number" class="form-control @error('nisn') is-invalid @enderror"
                                        value="{{ old('nisn') }}" id="nisn" name="nisn"
                                        placeholder="Enter your nisn" autofocus required>
                                    @error('nisn')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        value="{{ old('nama') }}" placeholder="Enter your nama" autofocus required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" id="email" name="email"
                                        placeholder="Enter your email" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3 form-password-toggle">
                                    <label class="form-label" for="password">Password</label>
                                        <input type="password" id="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            aria-describedby="password" required value="{{ old('password') }}" />
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <input type="text" name="role" value="Siswa" hidden>
                                <div class="mb-3">
                                    <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                                    <div class="">
                                        <input name="jenis_kelamin" class="form-check-input" type="radio"
                                            value="Laki-laki" id="Laki-laki" checked />
                                        <label class="form-check-label" for="Laki-laki">
                                            Laki-laki
                                        </label>

                                        <input name="jenis_kelamin" class="form-check-input" type="radio"
                                            value="Perempuan" id="Perempuan" />
                                        <label class="form-check-label" for="Perempuan">
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                        value="{{ old('tanggal_lahir') }}" placeholder="Enter your tanggal_lahir" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="alamat">Alamat</label>
                                    <div class="input-group input-group-merge">
                                        <textarea class="form-control" id="alamat" name="alamat" required>{{ old('alamat') }}</textarea>
                                    </div>
                                </div>

                                <button class="btn btn-primary d-grid w-100">
                                    Sign up
                                </button>
                            </form>

                            <p class="text-center">
                                <span>Already have an account?</span>
                                <a href="{{ route('login') }}">
                                    <span>Sign in</span>
                                </a>
                            </p>
                            <p class="text-center">
                                <a href="/">
                                    <span>Back to home</span>
                                </a>
                            </p>
                        </div>
                    </div>

                </div>
                <!-- Register Card -->
            </div>
            <!-- Register Card -->
        </div>
    </div>
@endsection
