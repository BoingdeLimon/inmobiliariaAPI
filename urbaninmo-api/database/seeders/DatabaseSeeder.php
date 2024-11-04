<?php

namespace Database\Seeders;

use App\Livewire\Rentals;
use App\Models\User;
use App\Models\Address;
use App\Models\Comments;
use App\Models\Photos;
use App\Models\RealEstate;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            UserSeeder::class
        ]);
        $this->call([
            AddressSeeder::class
        ]);

 

        $this->call([
            RealEstateSeeder::class
        ]);
        
        $this->call([
            PhotosSeeder::class
        ]);
        

        //**     */
    }
}
