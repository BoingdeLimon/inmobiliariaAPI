<?php

namespace Database\Seeders;

use App\Models\Photos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhotosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Photos::create([
            'id_real_estate' => 1,
            'photo' => 'casa.jpg'
        ]);
    }
}
