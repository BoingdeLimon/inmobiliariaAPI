<?php

namespace Database\Seeders;

use App\Models\RealEstate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RealEstateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RealEstate::create([
            'id_user' => 1,
            'title' => 'Casa en venta',
            'description' => 'Casa en venta en la colonia San José',
            'size' => 200,
            'rooms' => 3,
            'bathrooms' => 2,
            'type' => 'Casa',
            'has_garage' => true,
            'has_garden' => true,
            'has_patio' => true,
            'id_address' => 1,
            'price' => '$1,000,000',
            'is_occupied' => false,
            'pdf' => 'casa-en-venta.pdf'

        ]);
    }
}
