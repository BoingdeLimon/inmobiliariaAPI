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
        //6 usuarios
        User::create([
            'name' => 'José Alvarado',
            'email' => 'AlvaradoJose@example.com',
            'password' => Hash::make('password123'), 
            'phone' => '1234567890',
            'role' => 'admin',
            'photo' => '', 
        ]);
        User::create([
            'name' => 'Evelio Alvarez',
            'email' => 'Evelio@example.com',
            'password' => Hash::make('password123'), 
            'phone' => '1234567890',
            'role' => 'user',
            'photo' => '', 
        ]);
        User::create([
            'name' => 'Oliver Mondragon',
            'email' => 'Oliver@example.com',
            'password' => Hash::make('password123'), 
            'phone' => '1234567890',
            'role' => 'user',
            'photo' => '', 
        ]);
        User::create([
            'name' => 'Emiliano Flores',
            'email' => 'Emiliano@example.com',
            'password' => Hash::make('password123'), 
            'phone' => '1234567890',
            'role' => 'user',
            'photo' => '', 
        ]);
        User::create([
            'name' => 'Jorge Bazan',
            'email' => 'Jorge@example.com',
            'password' => Hash::make('password123'), 
            'phone' => '1234567890',
            'role' => 'user',
            'photo' => '', 
        ]);
        User::create([
            'name' => 'Rodrigo Salgado',
            'email' => 'Rodrigo@example.com',
            'password' => Hash::make('password123'), 
            'phone' => '1234567890',
            'role' => 'user',
            'photo' => '', 
        ]);
        
    }
}
