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

    public function test_all_real_estates()
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
    public function test_filter_real_estates()
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

    public function test_user_can_create_real_estate()
    {
        $user = User::factory()->create();

        // $token = $user->createToken('TestToken')->plainTextToken;
        $token = $user->createToken('MiToken')->plainTextToken;

        $newRealEstate = [
            "user_id" => $user->id,
            "title" => "Apartamento con vista a la ciudad",
            "description" => "Apartamento moderno de 2 habitaciones en el piso 10, con vistas panorámicas de la ciudad.",
            "size" => 85.5,
            "rooms" => 2,
            "bathrooms" => 1,
            "type" => "apartamento",
            "has_garage" => false,
            "has_garden" => false,
            "has_patio" => false,
            "address" => "Avenida Reforma 789",
            "zipcode" => "54321",
            "city" => "Monterrey",
            "state" => "Nuevo León",
            "country" => "México",
            "x" => 25.686611,
            "y" => 100.31611,
            "photo" => [
                "url_foto_vista_1.jpg",
                "url_foto_vista_2.jpg"
            ],
            "price" => 2500,
            "is_occupied" => false,
            "pdf" => "url_documento_apartamento.pdf"
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->postJson('/api/newRental', $newRealEstate);

        $response->assertStatus(201);

        $this->assertDatabaseHas('real_estate', [
            'title' => "Apartamento con vista a la ciudad",
            'description' => "Apartamento moderno de 2 habitaciones en el piso 10, con vistas panorámicas de la ciudad.",
            'user_id' => $user->id,
        ]);
    }

    public function test_user_can_delete_real_estate()
    {
        $user = User::factory()->create();
        $token = $user->createToken('MiToken')->plainTextToken;
        $address = Address::factory()->create([
            'city' => 'Morelia',
        ]);

        $realEstate = RealEstate::factory()->create([
            'user_id' => $user->id,
            'id_address' => $address->id,
            'price' => "123456.00"
        ]);

        Photos::factory()->create([
            'id_real_estate' => $realEstate->id,
        ]);

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->postJson('/api/deleteRental', [
            'id_real_estate' => $realEstate->id,
        ]);

        $response->assertStatus(200);
        $response->assertJson(['status' => 'successfull']);

        $this->assertDatabaseMissing('real_estate', [
            'id' => $realEstate->id,
        ]);
    }

    public function test_user_can_update_real_estate()
    {
        $user = User::factory()->create();

        $token = $user->createToken('MiToken')->plainTextToken;

        $address = Address::factory()->create([
            'city' => 'Morelia',
        ]);

        $realEstate = RealEstate::factory()->create([
            'user_id' => $user->id,
            'id_address' => $address->id,
            'price' => "123456.00"
        ]);

        Photos::factory()->create([
            'id_real_estate' => $realEstate->id,
        ]);

        $updatedRealEstateData = [
            'id_real_estate' => $realEstate->id,
            'user_id' => $user->id,
            'title' => 'Apartamento con vista a la ciudad - actualizado',
            'description' => 'Apartamento moderno de 2 habitaciones en el piso 10, con vistas panorámicas de la ciudad. Ahora incluye acceso a gimnasio.',
            'size' => 90.0,
            'rooms' => 2,
            'bathrooms' => 1,
            'type' => 'apartamento',
            'has_garage' => true,
            'has_garden' => false,
            'has_patio' => false,
            'address' => 'Avenida Reforma',
            'zipcode' => '54321',
            'city' => 'Monterrey',
            'state' => 'Nuevo León',
            'country' => 'Argen',
            'x' => 19.71986,
            'y' => -101.19138,
            'photo' => [
                'url_foto_vista_1_actualizada.jpg',
                'url_foto_vista_2_actualizada.jpg'
            ],
            'price' => 2700,
            'is_occupied' => false,
            'pdf' => 'url_documento_apartamento_actualizado.pdf'
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token, 
        ])->postJson('/api/editRental', $updatedRealEstateData);

        $response->assertStatus(200);

        $response->assertJsonFragment([
            'message' => 'Real Estate updated successfully', 
        ]);

        $this->assertDatabaseHas('real_estate', [
            'id' => $realEstate->id,
            'title' => 'Apartamento con vista a la ciudad - actualizado',
            'price' => 2700,
        ]);

        $this->assertDatabaseHas('photos', [
            'id_real_estate' => $realEstate->id,
            'photo' => 'url_foto_vista_1_actualizada.jpg',
        ]);
    }
}
