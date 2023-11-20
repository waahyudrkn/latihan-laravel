<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('siswas')->insert([
            'nis'=>'123456789056',
            'nama_siswa'=>'dimas',
            'kelas'=> 11,
            'jurusan'=> 'teknik mesin industri',
            'jenis_kelamin' => 'laki-laki',
            'foto' => 'foto.jpg',
            'dokumen' => 'dock.pdf'
        ]);

        DB::table('siswas')->insert([
            'nis'=>'123456789057',
            'nama_siswa'=>'udin',
            'kelas'=> 12,
            'jurusan'=> 'teknik audio vidio',
            'jenis_kelamin' => 'laki-laki',
            'foto' => 'foto.jpg',
            'dokumen' => 'dock.pdf'
        ]);

        DB::table('siswas')->insert([
            'nis'=>'123456789058',
            'nama_siswa'=>'siti',
            'kelas'=> 10,
            'jurusan'=> 'rekayasa perangkat lunak',
            'jenis_kelamin' => 'laki-laki',
            'foto' => 'foto.jpg',
            'dokumen' => 'dock.pdf'
        ]);


    }
}
