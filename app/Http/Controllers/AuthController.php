<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Mail\NotifikasiRegis;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->with(
            'email',
            'The provided credentials do not match our records.'
        );
    }

    public function register()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        $countSiswa = Siswa::where('nisn', $request->nisn)->first();
        // dd($countSiswa == null);
        // dd(User::where('siswa_id', $countSiswa->id)->count() == 0);

        if ($countSiswa == null) {

            $this->validate($request, [
                'nisn' => 'required|unique:siswas,nisn',
                'nama' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required|min:5',
                'tanggal_lahir' => 'required',
                'alamat' => 'required',
            ]);

            $siswa = Siswa::create([
                'nisn' => $request->nisn,
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat' => $request->alamat,
                'kelas_id' => 'PSB',
            ])->id;

            User::create([
                'siswa_id' => $siswa,
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat' => $request->alamat,
            ]);
        } elseif (User::where('siswa_id', $countSiswa->id)->count() == 0) {

            $this->validate($request, [
                'nisn' => 'required',
                'nama' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required|min:5',
                'tanggal_lahir' => 'required',
                'alamat' => 'required',
            ]);
            
            Siswa::where('id', $countSiswa->id)->update([
                'nisn' => $request->nisn,
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat' => $request->alamat,
            ]);

            User::create([
                'siswa_id' => $countSiswa->id,
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat' => $request->alamat,
            ]);
        } else {
            return back()->with('message', 'Akun yang anda daftarkan sudah terdaftar pada aplikasi ini!');
        }

        Mail::to($request->email)->send(new NotifikasiRegis());
        return redirect('/login')->with('message', 'Berhasil mendaftarkan akun!');
    }

    public function changePassword()
    {
        return view('auth.changepassword');
    }

    public function postPassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required|min:5|same:confirm_new_password',
            'confirm_new_password' => 'required',
        ]);

        $user = $request->User();

        if (Hash::check($request->old_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->new_password),
            ]);

            Alert::success('Password berhasil di update!');
            return redirect('dashboard');
        } else {
            Alert::error('Password lama salah');
            return back();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function profile()
    {
        $akun = User::where('id', auth()->user()->id)->first();

        return view('auth.profile', compact('akun'));
    }

    public function updateProfile(Request $request)
    {
        $getId = Siswa::where('id', auth()->user()->siswa_id)->first();

        $this->validate($request, [
            'nisn' => [
                'required',
                Rule::unique('siswas')->ignore($getId->id)
            ],
            'nama' => 'required',
            'email' => 'required|unique:users,email,' . auth()->user()->id,
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
        ]);

        Siswa::where('nisn', Auth::user()->nisn)->update([
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
        ]);

        User::where('id', $request->id)->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
        ]);

        Alert::success('Berhasil memperbarui profile!');
        return back();
    }

    public function index()
    {
        $user = User::all();
        return view('user.index', compact('user'));
    }

    public function read()
    {
        $user = User::orderBy('role', 'asc')->get();
        return view('user.read', compact('user'));
    }

    public function show($id)
    {
        $user = User::where('id', $id)->first();
        return view('user.show', compact('user'));
    }

    public function destroy($id)
    {
        $post = User::where('id', $id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Berhasil menghapus data user!',
            'data'    => $post
        ]);
    }
}
