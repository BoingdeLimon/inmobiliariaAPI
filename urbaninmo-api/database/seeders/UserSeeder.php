<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'José Alvarado',
            'email' => 'AlvaradoJose@example.com',
            'password' => Hash::make('password123'), 
            'phone' => '1234567890',
            'role' => 'admin',
            'photo' => 'https://cdn-images.livecareer.es/pages/foto_cv_lc_es_4.jpg', 
        ]);

        
    }
}
