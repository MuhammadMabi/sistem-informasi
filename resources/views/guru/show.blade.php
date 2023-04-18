<div class="modal-body">
    <div class="row" id="edit-kelas">
        <table class="table">
            <tbody>
                <tr>
                    <td>NIP</td>
                    <td>:</td>
                    <td>{{ $guru->nip ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ $guru->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>{{ $guru->jenis_kelamin ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>:</td>
                    <td>{{ $guru->tanggal_lahir ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{ $guru->alamat ?? '-' }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
</div>
