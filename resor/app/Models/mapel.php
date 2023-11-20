<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mapel extends Model
{
    use HasFactory;
    protected $primaryKey = 'kode_mapel';
    protected $table = 'mapel';
    protected $fillable = ['kode_mapel', 'nama_mapel'];

    public function nilai()
    {
        return $this->hasMany(nilai::class, 'kode_mapel', 'kode_mapel');
    }

   
}
