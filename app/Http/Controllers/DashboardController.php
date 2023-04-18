<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $guru = Guru::count();
        $kelas = Kelas::count();
        $psb = Siswa::where('kelas_id', 'PSB')->count();
        $siswa = Siswa::where('kelas_id', '!=', 'PSB')->count();
        $user = User::where('role', 'Siswa')->count();
        $admin = User::where('role', 'Admin')->count();
        $sekolah = Sekolah::first();

        return view('dashboard', compact('guru', 'kelas', 'psb', 'siswa', 'user', 'admin', 'sekolah'));
    }
}
