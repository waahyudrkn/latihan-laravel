<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // data siswa
        Permission::create(['name' => 'tambah-siswa']);
        Permission::create(['name' => 'edit-siswa']);
        Permission::create(['name' => 'hapus-siswa']);
        Permission::create(['name' => 'lihat-siswa']);

        //data mapel
        Permission::create(['name' => 'tambah-mapel']);
        Permission::create(['name' => 'edit-mapel']);
        Permission::create(['name' => 'hapus-mapel']);
        Permission::create(['name' => 'lihat-mapel']);

        //data mapel
        Permission::create(['name' => 'tambah-nilai']);
        Permission::create(['name' => 'edit-nilai']);
        Permission::create(['name' => 'hapus-nilai']);
        Permission::create(['name' => 'lihat-nilai']);

        // ROLE
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'guru']);
        Role::create(['name' => 'siswa']);

        // role admin
        $roleAdmin = Role::findByName('admin');
        $roleAdmin->givePermissionTo('tambah-siswa', 'edit-siswa', 'hapus-siswa', 'lihat-siswa',
                                    'tambah-mapel', 'edit-mapel', 'hapus-mapel', 'lihat-mapel',
                                    'tambah-nilai', 'edit-nilai', 'hapus-nilai', 'lihat-nilai');

        // role guru
        $roleGuru = Role::findByName('guru');
        $roleGuru->givePermissionTo('tambah-nilai', 'edit-nilai', 'hapus-nilai',
                                    'lihat-siswa', 'lihat-mapel', 'lihat-nilai');


        // role siswa
        $roleSiswa = Role::findByName('siswa');
        $roleSiswa->givePermissionTo('lihat-siswa', 'lihat-mapel', 'lihat-nilai');
    }
}
