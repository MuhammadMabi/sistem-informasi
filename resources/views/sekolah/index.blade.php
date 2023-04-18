@extends('layouts/contentNavbarLayout')

@section('title', 'Sekolah')
@section('menu', 'sekolah')

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/masonry/masonry.js') }}"></script>
@endsection

@section('content')

    <!-- Examples -->
    <div class="row mb-5">
        <div class="col-md-6 col-lg-12 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Manajemen Profile Sekolah</h5>
                    <hr class="my-0 mt-4 mb-4">
                    <div id="read">
                    </div>
                </div>
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
            $.get("{{ url('/sekolah/read') }}", {}, function(kelas, status) {
                $("#read").html(kelas);
            });
        }

        function store() {
            $.get("{{ url('/sekolah/read') }}", {}, function(kelas, status) {
                $("#read").html(kelas);
            });

            let id = $('#id').val();
            let npsn = $('#npsn').val();
            let nama = $('#nama').val();
            let status = $('#status').val();
            let email = $('#email').val();
            let no_telp = $('#no_telp').val();
            let alamat = $('#alamat').val();
            let token = $("meta[name='csrf-token']").attr("content");

            $.ajax({

                url: `/sekolah/createOrUpdate`,
                type: "POST",
                cache: false,
                data: {
                    "id": id,
                    "npsn": npsn,
                    "nama": nama,
                    "status": status,
                    "email": email,
                    "no_telp": no_telp,
                    "alamat": alamat,
                    "_token": token
                },
                success: function(response) {
                    read()
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
                },
                error: function(response) {
                    $('#id').val(id);
                    $('#npsn').val(npsn);
                    $('#nama').val(nama);
                    $('#status').val(status);
                    $('#email').val(email);
                    $('#no_telp').val(no_telp);
                    $('#alamat').val(alamat);

                    $.each(response.responseJSON.errors, function(key, value) {
                        $('#' + key).addClass('is-invalid')
                        $('.alert-' + key).removeClass('d-none')
                        $('.alert-' + key).append("<p>" + value + "</p>")
                    })
                }
            });
        }
    </script>
@endsection
