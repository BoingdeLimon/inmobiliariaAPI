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
        //1
        Address::create([
            'address' => 'Barrio San José #111',
            'zipcode' => '24040',
            'city' => 'San Francisco de Campeche',
            'state' => 'Campeche',
            'country' => 'México',
            'x' => 19.833721,
            'y' => -90.538475
        ]);
        //2
        Address::create([
            'address' => 'Loma del Parque #180',
            'zipcode' => '58170',
            'city' => 'Morelia',
            'state' => 'Michoacan',
            'country' => 'México',
            'x' => 19.689030,
            'y' => -101.229378
        ]);
        //3
        Address::create([
            'address' => 'Cerrada Coyamel #203B',
            'zipcode' => '04369',
            'city' => 'Coyoacan',
            'state' => 'Ciudad de Mexico',
            'country' => 'México',
            'x' => 19.333551,
            'y' => -99.165089
        ]);
        //4
        Address::create([
            'address' => 'Manuel Ordoñez #215',
            'zipcode' => '66350',
            'city' => 'Monterrey',
            'state' => 'Nuevo Leon',
            'country' => 'México',
            'x' => 25.673914,
            'y' => -100.463590
        ]);
        //5
        Address::create([
            'address' => 'Montevideo #2477',
            'zipcode' => '44630',
            'city' => 'Guadalajara',
            'state' => 'Jalisco',
            'country' => 'México',
            'x' => 20.703189,
            'y' => -103.381780
        ]);
    }
}
