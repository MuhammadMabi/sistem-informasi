<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KelasController extends Controller
{

    public function kelassiswa()
    {
        $kelas = Kelas::orderBy('created_at', 'asc')->get();

        return view('kelas.siswa', compact('kelas'));
    }

    public function index()
    {
        $kelas = Kelas::latest()->first();
        $guru = Guru::all();

        return view('kelas.index', compact('kelas', 'guru'));
    }

    public function read()
    {
        $kelas = Kelas::latest()->get();

        return view('kelas.read', compact('kelas'));
    }


    public function createOrUpdate(Request $request)
    {
        $getId = Kelas::where('id', $request->id)->first();

        $this->validate($request, [
            'kelas' => 'required',
            'guru_id' => 'required',
        ]);

        if ($getId) {
            $post = $getId->update([
                'kelas' => $request->kelas,
                'guru_id' => $request->guru_id
            ]);
            $message = 'Berhasil memperbarui data kelas!';
        } else {
            $post = Kelas::create($request->all());
            $message = 'Berhasil membuat data kelas!';
        }

        return response()->json([
            'success' => true,
            'message' => $message,
            'data'    => $post
        ]);
    }

    public function create()
    {
        $guru = Guru::all();
        return view('kelas.create', compact('guru'));
    }

    public function edit($id)
    {
        $kelas = Kelas::where('id', $id)->first();
        $guru = Guru::all();

        return view('kelas.edit', compact('kelas', 'guru'));
    }


    public function destroy($id)
    {
        $siswa = Siswa::where('kelas_id', $id)->first();

        if ($siswa) {
            $message = 'Data kelas ini terpakai oleh siswa!';
            $success = false;
        } else {
            $message = 'Berhasil menghapus data kelas!';
            $success = true;
            Kelas::where('id', $id)->delete();
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
