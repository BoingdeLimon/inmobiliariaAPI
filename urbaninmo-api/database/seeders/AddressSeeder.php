<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Address::create([
            'id' => 1,
            'address' => 'Calle 1 #123',
            'zipcode' => '12345',
            'city' => 'Campeche',
            'state' => 'Campeche',
            'country' => 'México',
            'x' => 18.4830556,
            'y' => -69.9391667
        ]);
    }
}
