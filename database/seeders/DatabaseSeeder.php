<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(5)->create();
        \App\Models\Ruangan::factory(5)->create();
        \App\Models\Kategori::factory(5)->create();
        \App\Models\Barang::factory(5)->create();
        \App\Models\Barangkeluar::factory(5)->create();

        \App\Models\User::factory()->create([
            'name' => 'Mas Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '12345',
            'role' => '1'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Mas Pegawai UPPD',
            'username' => 'uppd',
            'email' => 'uppd@gmail.com',
            'password' => '12345',
            'role' => '2'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Mas Pegawai Samsat',
            'username' => 'samsat',
            'email' => 'samsat@gmail.com',
            'password' => '12345',
            'role' => '3'
        ]);
    }
}
