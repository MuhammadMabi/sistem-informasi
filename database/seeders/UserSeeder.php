<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $siswa = Siswa::create([
            'nisn' => '20202020',
            'nama' => 'Admin',
            'jenis_kelamin' => 'Laki-laki',
            'tanggal_lahir' => Carbon::parse('2000-01-01'),
            'alamat' => 'Jl Admin',
            'kelas_id' => 'PSB',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'siswa_id' => $siswa->id,
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345'),
            'role' => 'Admin',
            'jenis_kelamin' => 'Laki-laki',
            'tanggal_lahir' => Carbon::parse('2000-01-01'),
            'alamat' => 'Jl Admin',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
