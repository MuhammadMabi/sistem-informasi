<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sekolahs')->insert([
            'npsn' => '20230415',
            'nama' => 'SMK Informatika Utama',
            'status' => 'Swasta',
            'email' => 'smkiu@gmail.com',
            'no_telp' => '08888',
            'alamat' => 'Jl Pln',
        ]);
    }
}
