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
        $data = [
            'umur' => '18',
            'jurusan' => 'Rekayasa Perangkat Lunak',
            'tanggallahir' => '2001-5-17',
        ];

       User::create([
        'username' => 'nicky',
        'password' => 'nicky123',
        'nama' => 'Nickymicko Ayub Hema Sasmitarja',
        'profil' => json_encode($data),
        'role' => 'Admin'
       ]);

       User::create([
        'username' => 'pasha',
        'password' => 'pasha123',
        'nama' => 'Muhamad Pasha Albara',
        'profil' => json_encode($data),
        'role' => 'Admin'
       ]);
    }
}
