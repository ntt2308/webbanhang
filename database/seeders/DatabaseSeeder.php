<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('admin')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('1234567')     
        ]);

        // Thêm tài khoản admin mới
        DB::table('admin')->insert([
            'name' => 'admin2',
            'email' => 'admin2@gmail.com',
            'phone' => '0123456789',
            'password' => bcrypt('1234567')     
        ]);
    }
}
