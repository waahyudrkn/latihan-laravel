<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nilai extends Model
{
    use HasFactory;
    protected $table = 'nilai';
    protected $primarykey = 'id';
    protected $fillable = ['nis', 'kode_mapel', 'nilai'];

    public function siswa()
    {
        return $this->belongsTo(siswa::class, 'nis', 'nis');
    }

    public function mapel()
    {
        return $this->belongsTo(mapel::class, 'kode_mapel', 'kode_mapel');
    }
}
