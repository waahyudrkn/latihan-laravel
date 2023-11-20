<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;
    protected $primaryKey = 'nis';
    protected $table = 'siswas';
    protected $fillable = [ 'nis', 'nama_siswa', 'kelas', 'jurusan', 'foto', 'dokumen', 'jenis_kelamin'];

 
    public function nilai()
    {
        return $this->hasMany(nilai::class, 'nis', 'nis');
    }

    
}


