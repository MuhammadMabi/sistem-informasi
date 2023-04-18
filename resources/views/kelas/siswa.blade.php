@extends('layouts/contentNavbarLayout')

@section('title', 'Kelas')
@section('menu', 'kelas-siswa')

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/masonry/masonry.js') }}"></script>
@endsection

@section('style')
    <style>
        .float-inline {
            display: inline-block;
            vertical-align: middle;
            margin: 10px 0;
        }

        .btnmdl {
            margin-left: 10px;
        }

        #btntambah {
            float: right;
        }
    </style>
@endsection

@section('content')

    <!-- Examples -->
    <div class="row mb-5">
        <div class="col-md-6 col-lg-12 mb-3">
            <div class="card h-100">
                <div class="card-header text-center pb-0 mb-3">
                    <h5 class="card-title float-inline">Data Kelas</h5>
                    @if (auth()->user()->role == 'Admin')
                        <button type="button" id="btntambah" onclick="create()" class="btn btn-primary">
                            Tambah
                        </button>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="example">
                            <thead>
                                <tr>
                                    <th width="10%">No</th>
                                    <th>Kelas</th>
                                    <th>Wali Kelas</th>
                                </tr>
                            </thead>
                            <tbody id="table-post">
                                @foreach ($kelas as $k)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $k->kelas }}</td>
                                        <td>{{ $k->guru->nama }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal  -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>

                <hr class="my-0 mt-3">
                <div id="data-modal-kelas"></div>
            </div>
        </div>
    </div>
    </div>
@endsection
