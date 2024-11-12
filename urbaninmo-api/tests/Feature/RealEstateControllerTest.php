<?php

namespace Tests\Feature;

use App\Models\Address;
use App\Models\Photos;
use App\Models\RealEstate;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RealEstateControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    // * Para hacer test seria: 
    // * php artisan test --filter  RealEstateControllerTest
    // public function test_example(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    use RefreshDatabase;

    public function test_all_Real_Estates()
    {
        $address = Address::factory()->create();
        $user = User::factory()->create();

        $realestate = RealEstate::factory(
            [
                'user_id' => $user->id,
                'id_address' => $address->id,
            ]
        )->create();
        $photos = Photos::factory([
            "id_real_estate" => $realestate->id

        ])->create();
        // $response = $this->getJson('/api/listAllRealEstates');
        $response = $this->postJson('/api/listAllRealEstates');


        $response->assertStatus(200);
    }
    public function test_filter_Real_Estates()
    {
        $address = Address::factory()->create([
            'city' => 'Morelia', 
        ]);
        
        $user = User::factory()->create();

        $realestate = RealEstate::factory([
            'user_id' => $user->id,
            'id_address' => $address->id,
            'price' => "123456.00 "
        ])->create();

        $photos = Photos::factory([
            'id_real_estate' => $realestate->id,
        ])->create();

        $filterRealEstate = [
            'city' => 'Morelia',
            'min_price' => "12345.00",
            'max_price' => "200000.00",
        ];

        $response = $this->postJson('/api/filterRentals', $filterRealEstate);
        $response->assertStatus(200);

        $response->assertJsonFragment([
            'city' => 'Morelia',
            'price' => "123456.00",
        ]);
    }
}
