<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();
        $kelas = Kelas::all();

        return view('siswa.index', compact('siswa', 'kelas'));
    }

    public function read()
    {
        $siswa = Siswa::all();
        $kelas = Kelas::all();

        return view('siswa.read', compact('siswa', 'kelas'));
    }

    public function create()
    {
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        return view('siswa.create', compact('siswa', 'kelas'));
    }

    public function createOrUpdate(Request $request)
    {
        $getId = Siswa::where('id', $request->id)->first();

        if ($getId) {

            $this->validate($request, [
                'nisn' => [
                    'required',
                    Rule::unique('siswas')->ignore($getId->id)
                ],
                'nama' => 'required',
                'tanggal_lahir' => 'required',
                'alamat' => 'required',
                'kelas_id' => 'required',
            ]);

            $post = Siswa::where('id', $request->id)->update([
                'nisn' => $request->nisn,
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat' => $request->alamat,
                'kelas_id' => $request->kelas_id,
            ]);

            $message = 'Berhasil memperbarui data siswa!';
        } else {

            $this->validate($request, [
                'nisn' => 'required|unique:siswas,nisn',
                'nama' => 'required',
                'tanggal_lahir' => 'required',
                'alamat' => 'required',
                'kelas_id' => 'required',
            ]);

            $post = Siswa::create($request->all());
            $message = 'Berhasil membuat data siswa!';
        }

        return response()->json([
            'success' => true,
            'message' => $message,
            'data'    => $post
        ]);
    }

    public function edit($id)
    {
        $siswa = Siswa::where('id', $id)->first();
        $kelas = Kelas::all();

        return view('siswa.edit', compact('siswa', 'kelas'));
    }

    public function show($id)
    {
        $siswa = Siswa::where('id', $id)->first();

        return view('siswa.show', compact('siswa'));
    }

    public function destroy($id)
    {
        $post = Siswa::where('id', $id)->delete();
        User::where('siswa_id', $id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Berhasil menghapus data siswa!',
            'data'    => $post
        ]);
    }
}
