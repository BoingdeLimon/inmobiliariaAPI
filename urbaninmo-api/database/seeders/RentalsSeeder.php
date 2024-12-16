<?php

namespace Database\Seeders;

use App\Models\Rentals;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RentalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //YYYY-DD-MM


        //1
        Rentals::create([
            'user_id' => '3',
            'id_real_estate' => '1',
            'rent_start' => '2024-14-10',
            'rent_end' => '2024-24-12',
            'reason_end' => 'No reason'
        ]);
        Rentals::create([
            'user_id' => '2',
            'id_real_estate' => '1',
            'rent_start' => '2024-15-01',
            'rent_end' => '2024-20-08',
            'reason_end' => 'No reason'
        ]);
        //2
        Rentals::create([
            'user_id' => '2',
            'id_real_estate' => '2',
            'rent_start' => '2024-01-15',
            'rent_end' => '2024-08-20',
            'reason_end' => 'No reason'
        ]);
        
        Rentals::create([
            'user_id' => '3',
            'id_real_estate' => '2',
            'rent_start' => '2024-02-10',
            'rent_end' => '2024-09-15',
            'reason_end' => 'Lease expired'
        ]);
        //3
        Rentals::create([
            'user_id' => '4',
            'id_real_estate' => '3',
            'rent_start' => '2024-03-05',
            'rent_end' => '2024-10-10',
            'reason_end' => 'Moved out'
        ]);
        
        Rentals::create([
            'user_id' => '5',
            'id_real_estate' => '3',
            'rent_start' => '2024-04-01',
            'rent_end' => '2024-11-30',
            'reason_end' => 'End of contract'
        ]);
        //4
        Rentals::create([
            'user_id' => '6',
            'id_real_estate' => '4',
            'rent_start' => '2024-05-15',
            'rent_end' => '2024-12-20',
            'reason_end' => 'Relocation'
        ]);
        Rentals::create([
            'user_id' => '5',
            'id_real_estate' => '4',
            'rent_start' => '2024-05-15',
            'rent_end' => '2024-12-20',
            'reason_end' => 'Relocation'
        ]);
        //5
        Rentals::create([
            'user_id' => '6',
            'id_real_estate' => '5',
            'rent_start' => '2024-01-15',
            'rent_end' => '2024-12-20',
            'reason_end' => 'Relocation'
        ]);
        Rentals::create([
            'user_id' => '6',
            'id_real_estate' => '5',
            'rent_start' => '2024-05-15',
            'rent_end' => '2024-08-20',
            'reason_end' => 'Relocation'
        ]);
    }
}
