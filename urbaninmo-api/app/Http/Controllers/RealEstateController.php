<?php

namespace App\Http\Controllers;

use App\Models\RealEstate;

use App\Models\Address;
use App\Models\Photos;
use App\Http\Controllers\AddressController;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RealEstateController extends Controller
{

    public function index()
    {
        return response()->json([
            'real_estate' => RealEstate::paginate()
        ]);
    }


    public function store(Request $request)
    {
        try {
            // Validar los campos requeridos
            $validatedData = $request->validate([
                'user_id' => 'required|exists:users,id', // Asegúrate de que user_id exista en la tabla users
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'size' => 'required|numeric',
                'rooms' => 'required|integer',
                'bathrooms' => 'required|integer',
                'type' => 'required|string',
                'has_garage' => 'required|boolean',
                'has_garden' => 'required|boolean',
                'has_patio' => 'required|boolean',
                'id_address' => 'required|integer',
                'price' => 'required|numeric',
                'is_occupied' => 'required|boolean',
                'pdf' => 'nullable|string',
            ]);
            $realEstate = RealEstate::create($validatedData);

            return response()->json([
                'message' => 'Real Estate created successfully',
                'real_estate' => $realEstate
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function update(Request $request, $id)
    {
        try {
            // Buscar el inmueble
            $realEstate = RealEstate::find($id);

            // Verificar si el inmueble existe
            if (!$realEstate) {
                return response()->json(['error' => 'Real Estate not found'], 404);
            }

            //  Validar que el usuario autenticado tiene permiso para modificar
            // if ($realEstate->user_id !== Auth::id() && !Auth::user()->is_admin) {
            //     return response()->json(['error' => 'Unauthorized'], 403);
            // }

            // Validar los campos a actualizar
            $validated = $request->validate([
                'title' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'size' => 'nullable|numeric',
                'rooms' => 'nullable|integer|min:1',
                'bathrooms' => 'nullable|integer|min:1',
                'type' => 'nullable|string|max:100',
                'has_garage' => 'nullable|boolean',
                'has_garden' => 'nullable|boolean',
                'has_patio' => 'nullable|boolean',
                'price' => 'nullable|numeric|min:0',
                'is_occupied' => 'nullable|boolean',
                'pdf' => 'nullable|string',
            ]);

            // Actualizar la propiedad con los datos validados
            $realEstate->update($validated);

            return response()->json([
                'message' => 'Real Estate updated successfully',
                'real_estate' => $realEstate,
            ], 200);
        } catch (\Exception $e) {
            // En caso de error, devolver un mensaje de error
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    public function destroy($id)
    {
        // Validar que el inmueble existe
        $realEstate = RealEstate::find($id);

        if (!$realEstate) {
            return response()->json(['error' => 'Real Estate not found'], 404);
        }

        // Validar que el usuario actual tiene permiso para eliminar 
        if ($realEstate->id_user !== Auth::id() && !Auth::user()->is_admin) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $realEstate->delete();

        return response()->json([
            'message' => 'Real Estate deleted successfully',
        ]);
    }
    public function showProperties()
    {
        $userId = Auth::id(); // Get the logged-in user's ID
        $properties = RealEstate::where('user_id', $userId)->get(); // Fetch user's properties
        return view('profile', compact('properties'));
    }




    // ! Endpoints Oliver
    protected $addressController;
    protected $photosController;

    public function __construct(AddressController $addressController, PhotosController $photosController)
    {
        $this->addressController = $addressController;
        $this->photosController = $photosController;
    }



    //* Esta funcion actua de la siguiente manera
    //* Si recibe user_id se va filtrar por ese id del usuario
    //* Si recibe id se va a filtrar por el id en especifico de RealEstate
    //* Si no recibe id, lista todas los realestates
    //* Este enfoque nos evita tener 3 funciones similares

    public function listAllRentals(Request $request)
    {
        $realEstates = null;

        if ($request->has('id')) {
            $realEstate = RealEstate::find($request->input('id'));
            if (!$realEstate) {
                return response()->json(['error' => 'Real estate not found'], 404);
            }
            $realEstates = collect([$realEstate]);
        } elseif ($request->has('user_id')) {
            $realEstates = RealEstate::where('user_id', $request->input('user_id'))->paginate();
        } else {
            $realEstates = RealEstate::paginate();
        }

        $fullRealEstate = $realEstates->map(function ($realEstate) {

            $address = $this->addressController->show(new Request(['id_address' =>  $realEstate->id_address]));
            $photos = $this->photosController->show(new Request(['id_real_estate' => $realEstate->id]));
            $realEstate->address = $address ? $address : null;
            $realEstate->photos = $photos ? $photos : null;

            $user_id = $realEstate->user_id;
            $user = User::find($user_id);
            $phoneRental = $user->phone;

            $realEstate->phoneRental = $phoneRental;
            return $realEstate;
        });

        return response()->json([
            'real_estate' => $fullRealEstate,
        ]);
    }

    public function RentalsPaginate(Request $request)
    {
        $realEstates = null;

        if ($request->has('id')) {
            $realEstate = RealEstate::find($request->input('id'));
            if (!$realEstate) {
                return response()->json(['error' => 'Real estate not found'], 404);
            }
            $realEstates = collect([$realEstate]);
        } elseif ($request->has('user_id')) {
            $realEstates = RealEstate::where('user_id', $request->input('user_id'))->paginate(4);
        } else {
            $realEstates = RealEstate::paginate(4);
        }

        $fullRealEstate = $realEstates->map(function ($realEstate) {

            $address = $this->addressController->show(new Request(['id_address' =>  $realEstate->id_address]));
            $photos = $this->photosController->show(new Request(['id_real_estate' => $realEstate->id]));
            $realEstate->address = $address ? $address : null;
            $realEstate->photos = $photos ? $photos : null;

            $user_id = $realEstate->user_id;
            $user = User::find($user_id);
            $phoneRental = $user->phone;

            $realEstate->phoneRental = $phoneRental;
            return $realEstate;
        });

        return response()->json([
            'real_estate' => $fullRealEstate,
        ]);
    }




    public function newRental(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'user_id' => 'required|exists:users,id',
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'size' => 'required|numeric',
                'rooms' => 'required|integer',
                'bathrooms' => 'required|integer',
                'type' => 'required|string',
                'has_garage' => 'required|boolean',
                'has_garden' => 'required|boolean',
                'has_patio' => 'required|boolean',

                'address' => 'required|string|max:255',
                'zipcode' => 'required|string|max:20',
                'city' => 'required|string|max:100',
                'state' => 'required|string|max:100',
                'country' => 'required|string|max:100',
                'x' => 'required|numeric',
                'y' => 'required|numeric',

                // * Puede ser confuso las siguientes lineas de codigo, lo que investigue fue que para que sea un array de strings, primero definimos el array
                // * despues decimos que cada elemento del array (photo) sea string, vaya lo unico que hace es validar
                // * -Oliver

                'photo' => 'required|array',
                'photo.*' => 'string',


                'price' => 'required|numeric',
                'is_occupied' => 'required|boolean',
                'pdf' => 'nullable|string',
            ]);
            $addressId = $this->addressController->store(new Request([
                'address' => $validatedData['address'],
                'zipcode' => $validatedData['zipcode'],
                'city' => $validatedData['city'],
                'state' => $validatedData['state'],
                'country' => $validatedData['country'],
                'x' => $validatedData['x'],
                'y' => $validatedData['y'],
            ]));


            $realEstateData = array_merge($validatedData, ['id_address' => $addressId]);
            unset($realEstateData['address'], $realEstateData['zipcode'], $realEstateData['city'], $realEstateData['state'], $realEstateData['country']);

            $realEstate = RealEstate::create($realEstateData);

            // * Como explique arriba en el comentario, aqui es crear un registro de foto por cada elemento del array

            foreach ($validatedData['photo'] as $photo) {
                $photoRequest = new Request([
                    'id_real_estate' => $realEstate->id,
                    'photo' => $photo,
                ]);
                $this->photosController->newImage($photoRequest);
            }

            return response()->json([
                'message' => 'Real Estate created successfully',
                'real_estate' => $realEstate
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage()
            ], 500);
        }
    }



    public function editRental(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'user_id' => 'required|exists:users,id',
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'size' => 'required|numeric',
                'rooms' => 'required|integer',
                'bathrooms' => 'required|integer',
                'type' => 'required|string',
                'has_garage' => 'required|boolean',
                'has_garden' => 'required|boolean',
                'has_patio' => 'required|boolean',

                'address' => 'required|string|max:255',
                'zipcode' => 'required|string|max:20',
                'city' => 'required|string|max:100',
                'state' => 'required|string|max:100',
                'country' => 'required|string|max:100',
                'x' => 'required|numeric',
                'y' => 'required|numeric',



                'photo' => 'required|array',
                'photo.*' => 'string',


                'price' => 'required|numeric',
                'is_occupied' => 'required|boolean',
                'pdf' => 'nullable|string',
            ]);

            $realEstateEdit = $request->input('id_real_estate');
            $realEstate = RealEstate::findOrFail($realEstateEdit);

            $addressId = $this->addressController->update(
                new Request(
                    [
                        'id_address' => $realEstate->id_address,
                        'address' => $validatedData['address'],
                        'zipcode' => $validatedData['zipcode'],
                        'city' => $validatedData['city'],
                        'state' => $validatedData['state'],
                        'country' => $validatedData['country'],
                        'x' => $validatedData['x'],
                        'y' => $validatedData['y'],

                    ]
                )
            );

            $realEstateData = array_merge($validatedData, ['id_address' => $addressId]);
            unset($realEstateData['address'], $realEstateData['zipcode'], $realEstateData['city'], $realEstateData['state'], $realEstateData['country']);

            $realEstate->update($realEstateData);

            foreach ($validatedData['photo'] as $photo) {
                $this->photosController->newImage(new Request(
                    [
                        "id_real_estate" => $realEstate->id,
                        "photo" => $photo
                    ]
                ));
            }

            return response()->json([
                'message' => 'Real Estate updated successfully',
                'real_estate' => $realEstate
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function deleteRental(Request $request)
    {
        try {
            $id_real_estate = $request->input('id_real_estate');
            $realEstate = RealEstate::find($id_real_estate);
            if (!$realEstate) {
                return ['status' => 'error'];
            }
            $addressResponse = $this->addressController->destroy(new Request(
                [
                    "id_address" => $realEstate->id_address
                ]
            ));
            if ($addressResponse['status'] === 'error') {
                return ['status' => 'error'];
            }
            $photosResponse = $this->photosController->deleteAllPhotos(new Request(
                [
                    "id_real_estate" => $id_real_estate
                ]
            ));

            if ($photosResponse['status'] === 'error') {
                return ['status' => 'error photo'];
            }
            $realEstate->delete();
            return ['status' => 'successfull'];
        } catch (\Exception $e) {
            return ['status' => 'error'];
        }
    }
    public function deleteRentalById($id)
    {
        try {
            $realEstate = RealEstate::find($id);
            if (!$realEstate) {
                return ['status' => 'error'];
            }

            $addressResponse = $this->addressController->destroy(new Request([
                'id_address' => $realEstate->id_address
            ]));

            if ($addressResponse['status'] === 'error') {
                return ['status' => 'error'];
            }

            $photosResponse = $this->photosController->deleteAllPhotos(new Request([
                'id_real_estate' => $id
            ]));

            if ($photosResponse['status'] === 'error') {
                return ['status' => 'error photo'];
            }

            $realEstate->delete();
            return ['status' => 'successful'];
        } catch (\Exception $e) {
            return ['status' => 'error realestate'];
        }
    }

    public function filterRentals(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'size' => 'nullable|numeric',
                'rooms' => 'nullable|integer',
                'bathrooms' => 'nullable|integer',
                'type' => 'nullable|string',

                'has_garage' => 'nullable|boolean',
                'has_garden' => 'nullable|boolean',
                'has_patio' => 'nullable|boolean',

                // TODO: Se necesita filtrar por la tabla address
                'zipcode' => 'nullable|string|max:20',
                'city' => 'nullable|string|max:100',
                'state' => 'nullable|string|max:100',
                'country' => 'nullable|string|max:100',

                // TODO: Se necesita filtrar por los precios
                'min_price' => 'nullable|numeric',
                'max_price' => 'nullable|numeric',

                'is_occupied' => 'nullable|boolean',
            ]);

            $query = DB::table('real_estate')
                ->join('address', 'real_estate.id_address', '=', 'address.id')
                ->select('real_estate.*', 'address.zipcode', 'address.city', 'address.state');

            foreach ($validatedData as $field => $value) {
                if ($value !== null) {
                    if (in_array($field, ['zipcode', 'city', 'state'])) {
                        $query->where("address.$field", $value);
                    } elseif ($field === 'min_price') {
                        $query->where("real_estate.price", '>=', floatval($value));
                    } elseif ($field === 'max_price') {
                        $query->where("real_estate.price", '<=', floatval($value));
                    } else {
                        $query->where("real_estate.$field", $value);
                    }
                }
            }

            $realEstatesFilter = $query->get();
            $fullRealEstate = $realEstatesFilter->map(function ($realEstate) {
                $address = $this->addressController->show(new Request(['id_address' =>  $realEstate->id_address]));
                $photos = $this->photosController->show(new Request(['id_real_estate' => $realEstate->id]));
                $realEstate->address = $address ? $address : null;
                $realEstate->photos = $photos ? $photos : null;
                return $realEstate;
            });

            return response()->json(['status' => 'successfull', 'data' => $fullRealEstate], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error'], 500);
        }
    }

    // ! ENDPOINTS SEARCHBAR PARA NEXT 
    // ! Evelio
    public function searchRealEstate(Request $request)
    {
        // Leer el parámetro 'search' desde el cuerpo de la solicitud
        $search = $request->input('search');

        // Si la búsqueda está vacía, retornar una respuesta vacía
        if (empty($search)) {
            return response()->json([]);
        }

        // Realizar la búsqueda en los campos 'title' y 'description' sin importar mayúsculas/minúsculas
        $results = RealEstate::with('address') // Agregar la relación 'address' a la consulta
            ->where(function ($query) use ($search) {
                $query->whereRaw('LOWER(title) LIKE ?', ['%' . strtolower($search) . '%'])
                    ->orWhereRaw('LOWER(description) LIKE ?', ['%' . strtolower($search) . '%']);
            })
            ->get();

        // Retornar los resultados encontrados, incluyendo la dirección
        return response()->json($results);
    }

    public function filterPaginate(Request $request)
    {
        $state = $request->input('state');
        $type = $request->input('type');
        $min_price = $request->input('min_price');
        $max_price = $request->input('max_price'); 
        $rooms = $request->input('rooms');
        $bathrooms = $request->input('bathrooms');

        $query = RealEstate::with(['address', 'photos']);

        $query->when($state, function ($q, $state) {
            return $q->where('state', $state);
        });

        $query->when($type, function ($q, $type) {
            return $q->where('type', $type);
        });

        $query->when($min_price, function ($q, $min_price) {
            return $q->where('price', '>=', $min_price);
        });

        $query->when($max_price, function ($q, $max_price) {
            return $q->where('price', '<=', $max_price);
        });

        $query->when($rooms, function ($q, $rooms) {
            return $q->where('rooms', $rooms);
        });

        $query->when($bathrooms, function ($q, $bathrooms) {
            return $q->where('bathrooms', $bathrooms);
        });
        $realEstates = $query->paginate(4)->appends($request->query());
        return response()->json($realEstates);
    }

    // public function filterRentals(Request $request)
    // {
    //     try {
    //         $validatedData = $request->validate([
    //             'size' => 'nullable|numeric',
    //             'rooms' => 'nullable|integer',
    //             'bathrooms' => 'nullable|integer',
    //             'type' => 'nullable|string',
    //             'has_garage' => 'nullable|boolean',
    //             'has_garden' => 'nullable|boolean',
    //             'has_patio' => 'nullable|boolean',

    //             // TODO: Se necesita filtrar por la tabla address
    //             'zipcode' => 'nullable|string|max:20',
    //             'city' => 'nullable|string|max:100',
    //             'state' => 'nullable|string|max:100',
    //             'country' => 'nullable|string|max:100',

    //             'price' => 'nullable|numeric',
    //             'is_occupied' => 'nullable|boolean',
    //         ]);
    //         $query = DB::table('real_estate')
    //             ->join('address', 'real_estate.id_address', '=', 'address.id')
    //             ->select('real_estate.*', 'address.zipcode', 'address.city', 'address.state');

    //         foreach ($validatedData as $field => $value) {
    //             if ($value !== null) {
    //                 if (in_array($field, ['zipcode', 'city', 'state'])) {
    //                     $query->where("address.$field", $value);
    //                 } else {
    //                     $query->where("real_estate.$field", $value);
    //                 }
    //             }
    //         }
    //         $realEstatesFilter = $query->get();
    //         return response()->json(['status' => 'successfull', 'data' => $realEstatesFilter], 200);
    //     } catch (\Throwable $th) {
    //         return ["status" => "error"];
    //     }
    // }
}
