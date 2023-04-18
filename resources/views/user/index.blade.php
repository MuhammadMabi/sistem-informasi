@extends('layouts/contentNavbarLayout')

@section('title', 'User')
@section('menu', 'user')

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
                    <h5 class="card-title float-inline">Data User</h5>
                    {{-- <button type="button" id="btntambah" class="btn btn-primary" onclick="create()">
                        Tambah
                    </button> --}}
                </div>
                <div class="card-body">
                    <div id="read" class="table-responsive">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <hr class="my-0 mt-3">
                <div id="data-modal-siswa"></div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            read();
        });

        function read() {
            $.get("{{ url('/user/read') }}", {}, function(kelas, status) {
                $("#read").html(kelas);
            });
        }

        function viewById(id)
        {
            $.get(`{{ url('/user/show/${id}') }}`, {}, function(kelas, status) {
                $('#exampleModalLabel').html('Detail User')
                $("#data-modal-siswa").html(kelas);
                $('#exampleModal').modal('show');
            });
        }

        // function edit(id) {
        //     $.get(`{{ url('/siswa/edit/${id}') }}`, {}, function(kelas, status) {
        //         $("#read").html(kelas);
        //     });
        // }

        // function create() {
        //     $.get(`{{ url('/siswa/create') }}`, {}, function(kelas) {
        //         $('#exampleModalLabel').html('Tambah Siswa')
        //         $("#data-modal-siswa").html(kelas);
        //         $('#exampleModal').modal('show');
        //     });
        // }

        // function show(id) {
        //     $.get(`{{ url('/siswa/edit/${id}') }}`, {}, function(kelas, status) {
        //         $('#exampleModalLabel').html('Edit Siswa')
        //         $("#data-modal-siswa").html(kelas);
        //         $('#exampleModal').modal('show');
        //     });
        // }

        // function update(id) {
        //     $.get(`{{ url('/siswa/edit/${id}') }}`, {}, function(kelas, status) {
        //         $('#exampleModalLabel').html('Edit Siswa')
        //         $("#data-modal-siswa").html(kelas);
        //     });

        //     let nisn = $('#nisn').val();
        //     let nama = $('#nama').val();
        //     let tanggal_lahir = $('#tanggal_lahir').val();
        //     let jenis_kelamin = $('.jenis_kelamin').val();
        //     let alamat = $('#alamat').val();
        //     let kelas_id = $('#kelas_id').val();
        //     let token = $("meta[name='csrf-token']").attr("content");

        //     $.ajax({

        //         url: `/siswa/createOrUpdate`,
        //         type: "POST",
        //         cache: false,
        //         data: {
        //             "id": id,
        //             "nisn": nisn,
        //             "nama": nama,
        //             "tanggal_lahir": tanggal_lahir,
        //             "jenis_kelamin": jenis_kelamin,
        //             "alamat": alamat,
        //             "kelas_id": kelas_id,
        //             "_token": token
        //         },
        //         success: function(response) {
        //             read();
        //             swal({
        //                 title: `Success!`,
        //                 text: response.message,
        //                 icon: "success",
        //                 buttons: {
        //                     cancel: false,
        //                     confirm: true,
        //                 },
        //                 dangerMode: false,
        //             })

        //             $('#nisn').val('');
        //             $('#nama').val('');
        //             $('#tanggal_lahir').val('');
        //             $('#jenis_kelamin').val('');
        //             $('#alamat').val('');
        //             $('#kelas_id').val('');
        //             $('#exampleModal').modal('hide');
        //         },

        //         error: function(response) {
        //             $('#nisn').val(nisn);
        //             $('#nama').val(nama);
        //             $('#tanggal_lahir').val(tanggal_lahir);
        //             $('#jenis_kelamin').val(jenis_kelamin);
        //             $('#alamat').val(alamat);
        //             $('#kelas_id').val(kelas_id);

        //             $.each(response.responseJSON.errors, function(key, value) {
        //                 $('#' + key).addClass('is-invalid')
        //                 $('.alert-' + key).removeClass('d-none')
        //                 $('.alert-' + key).append("<p>" + value + "</p>")
        //             })
        //         }

        //     });
        // }

        // function store() {
        //     $.get(`{{ url('/siswa/create') }}`, {}, function(kelas) {
        //         $('#exampleModalLabel').html('Tambah Siswa')
        //         $("#data-modal-siswa").html(kelas);
        //     });

        //     let nisn = $('#nisn').val();
        //     let nama = $('#nama').val();
        //     let tanggal_lahir = $('#tanggal_lahir').val();
        //     let jenis_kelamin = $('.jenis_kelamin').val();
        //     let alamat = $('#alamat').val();
        //     let kelas_id = $('#kelas_id').val();
        //     let token = $("meta[name='csrf-token']").attr("content");

        //     $.ajax({

        //         url: `/siswa/createOrUpdate`,
        //         type: "POST",
        //         cache: false,
        //         data: {
        //             "nisn": nisn,
        //             "nama": nama,
        //             "tanggal_lahir": tanggal_lahir,
        //             "jenis_kelamin": jenis_kelamin,
        //             "alamat": alamat,
        //             "kelas_id": kelas_id,
        //             "_token": token
        //         },
        //         success: function(response) {
        //             read();
        //             swal({
        //                 title: `Success!`,
        //                 text: response.message,
        //                 icon: "success",
        //                 buttons: {
        //                     cancel: false,
        //                     confirm: true,
        //                 },
        //                 dangerMode: false,
        //             })

        //             $('#nisn').val('');
        //             $('#nama').val('');
        //             $('#tanggal_lahir').val('');
        //             $('#alamat').val('');
        //             $('#kelas_id').val('');
        //             $('#exampleModal').modal('hide');
        //         },
        //         error: function(response) {
        //             $('#nisn').val(nisn);
        //             $('#nama').val(nama);
        //             $('#tanggal_lahir').val(tanggal_lahir);
        //             $('#jenis_kelamin').val(jenis_kelamin);
        //             $('#alamat').val(alamat);
        //             $('#kelas_id').val(kelas_id);

        //             $.each(response.responseJSON.errors, function(key, value) {
        //                 $('#' + key).addClass('is-invalid')
        //                 $('.alert-' + key).removeClass('d-none')
        //                 $('.alert-' + key).append("<p>" + value + "</p>")
        //             })
        //         }
        //     });
        // }

        function destroy(id) {

            let token = $("meta[name='csrf-token']").attr("content");

            swal({
                    title: `Warning!`,
                    text: 'Apakah anda yakin ingin menghapus siswa ini?',
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: `/user/destroy/${id}`,
                            type: "DELETE",
                            cache: false,
                            data: {
                                "_token": token
                            },
                            success: function(response) {
                                read()
                                if (response.success == true) {
                                    swal({
                                        title: `Success!`,
                                        text: response.message,
                                        icon: "success",
                                        buttons: {
                                            cancel: false,
                                            confirm: true,
                                        },
                                        dangerMode: false,
                                    })
                                } else {
                                    swal({
                                        title: `Failed!`,
                                        text: response.message,
                                        icon: "error",
                                        buttons: {
                                            cancel: false,
                                            confirm: true,
                                        },
                                        dangerMode: true,
                                    })
                                }

                            },
                        });
                    }
                });

        }
    </script>
@endsection
