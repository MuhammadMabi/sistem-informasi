<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::all();

        return view('guru.index', compact('guru'));
    }

    public function read()
    {
        $guru = Guru::all();

        return view('guru.read', compact('guru'));
    }

    public function create()
    {
        return view('guru.create');
    }

    public function createOrUpdate(Request $request)
    {
        $getId = Guru::where('id', $request->id)->first();

        if ($getId) {

            $this->validate($request, [
                'nip' => [
                    'required',
                    Rule::unique('gurus')->ignore($getId->id)
                ],
                'nama' => 'required',
                'tanggal_lahir' => 'required',
                'alamat' => 'required',
            ]);

            $post = Guru::where('id', $request->id)->update([
                'nip' => $request->nip,
                'nama' => $request->nama,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
            ]);

            $message = 'Berhasil memperbarui data guru!';
        } else {

            $this->validate($request, [
                'nip' => 'required|unique:gurus,nip',
                'nama' => 'required',
                'tanggal_lahir' => 'required',
                'alamat' => 'required',
            ]);

            $post = Guru::create($request->all());
            $message = 'Berhasil membuat data guru!';
        }

        return response()->json([
            'success' => true,
            'message' => $message,
            'data'    => $post
        ]);
    }

    public function edit($id)
    {
        $guru = Guru::where('id', $id)->first();

        return view('guru.edit', compact('guru'));
    }

    public function show($id)
    {
        $guru = Guru::where('id', $id)->first();

        return view('guru.show', compact('guru'));
    }

    public function destroy($id)
    {
        $kelas = Kelas::where('guru_id', $id)->first();

        if ($kelas) {
            $message = 'Guru ini sedang menjadi wali kelas!';
            $success = false;
        } else {
            $message = 'Berhasil menghapus data guru!';
            $success = true;
            Guru::where('id', $id)->delete();
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
