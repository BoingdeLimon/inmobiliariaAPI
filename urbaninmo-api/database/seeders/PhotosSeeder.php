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
            'photo' => 'uno.jpg'
        ]);
        Photos::create([
            'id_real_estate' => 1,
            'photo' => 'dos.jpg'
        ]);
        Photos::create([
            'id_real_estate' => 1,
            'photo' => 'tres.jpeg'
        ]);
        //2
        Photos::create([
            'id_real_estate' => 2,
            'photo' => 'cuatro.jpg'
        ]);
        Photos::create([
            'id_real_estate' => 2,
            'photo' => 'cinco.jpeg'
        ]);
        Photos::create([
            'id_real_estate' => 2,
            'photo' => 'seis.jpeg'
        ]);
        //3
        Photos::create([
            'id_real_estate' => 3,
            'photo' => 'siete.jpg'
        ]);
        Photos::create([
            'id_real_estate' => 3,
            'photo' => 'ocho.jpg'
        ]);
        Photos::create([
            'id_real_estate' => 3,
            'photo' => 'nueve.jpg'
        ]);
        //4
        Photos::create([
            'id_real_estate' => 4,
            'photo' => 'diez.jpg'
        ]);
        Photos::create([
            'id_real_estate' => 4,
            'photo' => 'once.jpg'
        ]);
        Photos::create([
            'id_real_estate' => 4,
            'photo' => 'doce.jpg'
        ]);
        //5
        Photos::create([
            'id_real_estate' => 5,
            'photo' => 'trece.jpg'
        ]);
        Photos::create([
            'id_real_estate' => 5,
            'photo' => 'catorce.jpg'
        ]);
        Photos::create([
            'id_real_estate' => 5,
            'photo' => 'quince.jpg'
        ]);
    }
}
