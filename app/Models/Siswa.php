<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id';
    protected $table = 'siswas';
    protected $fillable = ['nisn', 'nama', 'jenis_kelamin', 'tanggal_lahir', 'alamat', 'kelas_id'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    
    public function siswa()
    {
        return $this->hasOne(User::class);
    }
}
