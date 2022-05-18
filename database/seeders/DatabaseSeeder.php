<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Eulis Jubaedah',
            'username' => 'eulis',
            'jabatan' => 'Sekretaris',
            'status' => 'Aktif',
            'angkatan' => '2020',
            'email' => 'eulis@gmail.com',
            'password' => bcrypt('eulis')
        ]);
        User::create([
            'name' => 'Tia Rostiawati',
            'username' => 'tia',
            'jabatan' => 'Pengurus',
            'status' => 'Aktif',
            'angkatan' => '2020',
            'email' => 'tia@gmail.com',
            'password' => bcrypt('tia')
        ]);
        User::create([
            'name' => 'Haryati',
            'username' => 'haryati',
            'jabatan' => 'Pembina',
            'status' => 'Aktif',
            'angkatan' => '2014',
            'email' => 'haryati@gmail.com',
            'password' => bcrypt('haryati')
        ]);
        User::create([
            'name' => 'Singgih Sutan S',
            'username' => 'singgih',
            'jabatan' => 'Ketua',
            'status' => 'Aktif',
            'angkatan' => '2020',
            'email' => 'singgih@gmail.com',
            'password' => bcrypt('singgih')
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
