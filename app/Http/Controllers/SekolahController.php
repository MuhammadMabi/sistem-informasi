<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use Illuminate\Http\Request;

class SekolahController extends Controller
{

    public function index()
    {
        $sekolah = Sekolah::first();

        return view('sekolah.index', compact('sekolah'));
    }

    public function read()
    {
        $sekolah = Sekolah::first();

        return view('sekolah.read', compact('sekolah'));
    }

    public function createOrUpdate(Request $request)
    {
        $this->validate($request, [
            'npsn' => 'required',
            'nama' => 'required',
            'status' => 'required',
            'email' => 'required|email',
            'no_telp' => 'required',
            'alamat' => 'required'
        ]);

        $getId = Sekolah::where('id', $request->id)->first();

        if ($getId) {
            $post = Sekolah::where('id', $request->id)->update([
                'npsn' => $request->npsn,
                'nama' => $request->nama,
                'status' => $request->status,
                'email' => $request->email,
                'no_telp' => $request->no_telp,
                'alamat' => $request->alamat
            ]);

            $message = 'Berhasil memperbarui data sekolah!';
        } else {
            $post = Sekolah::create($request->all());
            $message = 'Berhasil membuat data sekolah!';
        }

        return response()->json([
            'success' => true,
            'message' => $message,
            'data'    => $post
        ]);
    }
}
