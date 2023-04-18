<div class="modal-body">
    <div class="row" id="edit-kelas">
        <table class="table">
            <tbody>
                <tr>
                    <td>NISN</td>
                    <td>:</td>
                    <td>{{ $user->siswa->nisn ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ $user->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>{{ $user->email ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Role</td>
                    <td>:</td>
                    <td>{{ $user->role ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>{{ $user->jenis_kelamin ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>:</td>
                    <td>{{ $user->tanggal_lahir ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{ $user->alamat ?? '-' }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
</div>
