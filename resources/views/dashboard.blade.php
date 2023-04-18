@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard')
@section('menu', 'dashboard')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Selamat Datang, {{ auth()->user()->nama }}!</h5>
                            <p class="mb-4">Untuk informasi terkait pelaksanaan PPDB Online dan memantau hasil seleksi akan
                                kami hubungi secepatnya.
                            </p>

                            {{-- <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a> --}}
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="{{ asset('assets/img/illustrations/man-with-laptop-light.png') }}" height="140"
                                alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 order-1">
            <div class="row">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2 col-md-12 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <div class="d-flex align-items-end mt-2">
                                <h3 class="mb-0 me-2">{{ $admin }}</h3>
                            </div>
                            <br>
                            <span>Admin</span>
                        </div>
                        <span class="badge bg-label-dark rounded p-2">
                            <i class="bx bx-user bx-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-12 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <div class="d-flex align-items-end mt-2">
                                <h3 class="mb-0 me-2">{{ $user }}</h3>
                            </div>
                            <br>
                            <span>User</span>
                        </div>
                        <span class="badge bg-label-primary rounded p-2">
                            <i class="bx bx-group bx-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-12 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <div class="d-flex align-items-end mt-2">
                                <h3 class="mb-0 me-2">{{ $kelas }}</h3>
                            </div>
                            <br>
                            <span>Kelas</span>
                        </div>
                        <span class="badge bg-label-warning rounded p-2">
                            <i class="bx bx-box bx-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-12 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <div class="d-flex align-items-end mt-2">
                                <h3 class="mb-0 me-2">{{ $guru }}</h3>
                            </div>
                            <br>
                            <span>Guru</span>
                        </div>
                        <span class="badge bg-label-info rounded p-2">
                            <i class="bx bx-crown bx-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-12 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <div class="d-flex align-items-end mt-2">
                                <h3 class="mb-0 me-2">{{ $siswa }}</h3>
                            </div>
                            <br>
                            <span>Siswa</span>
                        </div>
                        <span class="badge bg-label-success rounded p-2">
                            <i class="bx bx-user-check bx-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-12 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <div class="d-flex align-items-end mt-2">
                                <h3 class="mb-0 me-2">{{ $psb }}</h3>
                            </div>
                            <br>
                            <span>PSB</span>
                        </div>
                        <span class="badge bg-label-danger rounded p-2">
                            <i class="bx bx-user-voice bx-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Profile Sekolah</h5>
                            <hr class="my-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>NPSN</td>
                                            <td>:</td>
                                            <td>{{ $sekolah->npsn ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <td>{{ $sekolah->nama ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>:</td>
                                            <td>{{ $sekolah->status ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>:</td>
                                            <td>{{ $sekolah->email ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nomor Telepon</td>
                                            <td>:</td>
                                            <td>{{ $sekolah->no_telp ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td>{{ $sekolah->alamat ?? '-' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
