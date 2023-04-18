@extends('layouts/contentNavbarLayout')

@section('title', 'Kelas')
@section('menu', 'kelas')

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
                    <div id="read" class="table-responsive">
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

@section('page-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            read();
        });

        function read() {
            $.get("{{ url('/kelas/read') }}", {}, function(kelas, status) {
                $("#read").html(kelas);
            });
        }

        if ('{{ Auth::user()->role }}' == 'Admin') {

            function edit(id) {
                $.get(`{{ url('/kelas/edit/${id}') }}`, {}, function(kelas, status) {
                    $("#read").html(kelas);
                });
            }

            function create() {
                $.get(`{{ url('/kelas/create') }}`, {}, function(kelas) {
                    $('#exampleModalLabel').html('Tambah Kelas')
                    $("#data-modal-kelas").html(kelas);
                    $('#exampleModal').modal('show');
                });
            }

            function show(id) {
                $.get(`{{ url('/kelas/edit/${id}') }}`, {}, function(kelas, status) {
                    $('#exampleModalLabel').html('Edit Kelas')
                    $("#data-modal-kelas").html(kelas);
                    $('#exampleModal').modal('show');
                });
            }

            function update(id) {
                let kelas = $('#kelas').val();
                let guru_id = $('#guru_id').val();
                let token = $("meta[name='csrf-token']").attr("content");

                $.ajax({

                    url: `/kelas/createOrUpdate`,
                    type: "POST",
                    cache: false,
                    data: {
                        "id": id,
                        "kelas": kelas,
                        "guru_id": guru_id,
                        "_token": token
                    },
                    success: function(response) {
                        read();
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

                        $('#kelas').val('');
                        $('#guru_id').val('');
                        $('#exampleModal').modal('hide');
                    },

                    error: function(response) {
                        $('#kelas').val(kelas);
                        $('#guru_id').val(guru_id);

                        $.each(response.responseJSON.errors, function(key, value) {
                            $('#' + key).addClass('is-invalid')
                            $('.alert-' + key).removeClass('d-none')
                            $('.alert-' + key).append("<p>" + value + "</p>")
                        })
                    }

                });
            }

            function store() {
                $.get(`{{ url('/kelas/create') }}`, {}, function(kelas) {
                    $('#exampleModalLabel').html('Tambah Kelas')
                    $("#data-modal-kelas").html(kelas);
                });
                let kelas = $('#kelas').val();
                let guru_id = $('#guru_id').val();
                let token = $("meta[name='csrf-token']").attr("content");

                $.ajax({

                    url: `/kelas/createOrUpdate`,
                    type: "POST",
                    cache: false,
                    data: {
                        "kelas": kelas,
                        "guru_id": guru_id,
                        "_token": token
                    },
                    success: function(response) {
                        read();
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

                        $('#kelas').val('');
                        $('#guru_id').val('');
                        $('#exampleModal').modal('hide');
                    },
                    error: function(response) {
                        $('#kelas').val(kelas);
                        $('#guru_id').val(guru_id);

                        $.each(response.responseJSON.errors, function(key, value) {
                            $('#' + key).addClass('is-invalid')
                            $('.alert-' + key).removeClass('d-none')
                            $('.alert-' + key).append("<p>" + value + "</p>")
                        })
                    }
                });
            }

            function destroy(id) {

                let kelas_id = $(this).data('data-id');
                let token = $("meta[name='csrf-token']").attr("content");

                swal({
                        title: `Warning!`,
                        text: 'Apakah anda yakin ingin menghapus kelas ini?',
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: `/kelas/destroy/${id}`,
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
        }
    </script>
@endsection
