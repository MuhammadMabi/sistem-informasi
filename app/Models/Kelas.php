<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'kelas';
    protected $fillable = ['kelas', 'guru_id'];
    
    public function siswa()
    {
        return $this->hasOne(Siswa::class);
    }
    
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
}
