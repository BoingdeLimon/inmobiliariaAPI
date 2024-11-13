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
            'photo' => 'https://img10.naventcdn.com/avisos/resize/18/01/44/14/41/30/1200x1200/1476328295.jpg?isFirstImage=true'
        ]);
        Photos::create([
            'id_real_estate' => 1,
            'photo' => 'https://img10.naventcdn.com/avisos/18/01/44/14/41/30/360x266/1476328304.jpg'
        ]);
        Photos::create([
            'id_real_estate' => 1,
            'photo' => 'https://img10.naventcdn.com/avisos/18/01/44/14/41/30/360x266/1476328317.jpg'
        ]);
    }
}
