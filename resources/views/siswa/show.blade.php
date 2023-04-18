<div class="modal-body">
    <div class="row" id="edit-kelas">
        <table class="table">
            <tbody>
                <tr>
                    <td>NISN</td>
                    <td>:</td>
                    <td>{{ $siswa->nisn ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ $siswa->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>{{ $siswa->jenis_kelamin ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>:</td>
                    <td>{{ $siswa->tanggal_lahir ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{ $siswa->alamat ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>:</td>
                    <td>
                        @if ($siswa->kelas_id == 'PSB')
                            PSB
                        @else
                            {{ $siswa->kelas->kelas }}
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
</div>
