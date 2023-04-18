<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id';
    protected $table = 'gurus';
    protected $fillable = ['nip', 'nama', 'jenis_kelamin', 'tanggal_lahir', 'alamat'];
    
    public function kelas()
    {
        return $this->hasOne(Kelas::class);
    }
}
