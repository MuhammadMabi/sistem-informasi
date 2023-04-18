<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

</head>

<body>
    <table class="table" id="example">
        <thead>
            <tr>
                <th width="10%">No</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $i => $s)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $s->siswa->nisn }}</td>
                    <td>{{ $s->nama }}</td>
                    <td>{{ $s->role }}</td>
                    <td>
                        <a style="color: inherit" href="javascript:void(0)" id="btn-edit-post"
                            data-id="{{ $s->id }}" onclick="viewById({{ $s->id }})"><i
                                class="bx bx-info-circle me-1"></i></a>
                        {{-- <a style="color: inherit" href="javascript:void(0)" id="btn-edit-post"
                            data-id="{{ $s->id }}" onclick="show({{ $s->id }})"><i
                                class="bx bx-edit-alt me-1"></i></a> --}}
                        @if ($s->role == 'Siswa')
                            <a style="color: inherit" href="javascript:void(0)" id="btn-delete-post"
                                data-id="{{ $s->id }}" onclick="destroy({{ $s->id }})"><i
                                    class="bx bx-trash me-1"></i></a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

</body>

</html>
