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
        //1
        RealEstate::create([
            'user_id' => 2,
            'title' => 'Casa en venta',
            'description' => 'Casa cerca de la playa',
            'size' => 200,
            'rooms' => 3,
            'bathrooms' => 2,
            'type' => 'Casa',
            'has_garage' => true,
            'has_garden' => true,
            'has_patio' => true,
            'id_address' => 1,
            'price' => 1300000,
            'is_occupied' => false,
        ]);
        //2
        RealEstate::create([
            'user_id' => 3,
            'title' => 'Casa en renta',
            'description' => 'Casa en Fraccionamiento Las Lomas',
            'size' => 120,
            'rooms' => 3,
            'bathrooms' => 3,
            'type' => 'Casa',
            'has_garage' => true,
            'has_garden' => false,
            'has_patio' => false,
            'id_address' => 2,
            'price' => 20000,
            'is_occupied' => false,
        ]);
        //3
        RealEstate::create([
            'user_id' => 4,
            'title' => 'Departamento en renta',
            'description' => 'Departamento en Coyoacán cerca del Auditorio',
            'size' => 117,
            'rooms' => 3,
            'bathrooms' => 2,
            'type' => 'Departamento',
            'has_garage' => true,
            'has_garden' => false,
            'has_patio' => true,
            'id_address' => 3,
            'price' => 17000,
            'is_occupied' => false,
        ]);
        //4
        RealEstate::create([
            'user_id' => 4,
            'title' => 'Departamento en renta',
            'description' => 'Departamento en el corazón de Santa Catarina',
            'size' => 92,
            'rooms' => 2,
            'bathrooms' => 2,
            'type' => 'Departamento',
            'has_garage' => true,
            'has_garden' => false,
            'has_patio' => false,
            'id_address' => 4,
            'price' => 20000,
            'is_occupied' => false,
        ]);
        //5
        RealEstate::create([
            'user_id' => 5,
            'title' => 'Casa en venta',
            'description' => 'Casa en Providencia Guadalajara',
            'size' => 150,
            'rooms' => 3,
            'bathrooms' => 2,
            'type' => 'Casa',
            'has_garage' => true,
            'has_garden' => true,
            'has_patio' => true,
            'id_address' => 5,
            'price' => 800000,
            'is_occupied' => false,
        ]);
    }
}
