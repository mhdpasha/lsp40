<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       User::create([
        'username' => 'muhamadpasha',
        'password' => 'pasha123',
        'nama' => 'Muhamad Pasha Albara',
        'umur' => '18',
        'jurusan' => 'Rekayasa Perangkat Lunak',
        'tanggallahir' => '2006-10-01',
        'role' => 'asesor'
       ]);
    }
}
