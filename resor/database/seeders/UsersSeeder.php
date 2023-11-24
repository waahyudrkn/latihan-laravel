<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // seed admin
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $admin->assignRole('admin');

        // seed guru
        $guru = User::create([
            'name' => 'guru',
            'email' => 'guru@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $guru->assignRole('guru');

        // seed siswa
        $siswa = User::create([
            'name' => 'siswa',
            'email' => 'siswa@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $siswa->assignRole('siswa');
    }
}
