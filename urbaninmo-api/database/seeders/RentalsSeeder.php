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
        Rentals::create([
            'rent_start' => '2024-10-14',
            'rent_end' => '2024-10-24',
            'reason_end' => 'No reason'
        ]);
    }
}
