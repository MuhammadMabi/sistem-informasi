<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'sekolahs';
    protected $fillable = ['npsn', 'nama', 'status', 'email', 'no_telp', 'alamat'];
}
