<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Devuelve una lista paginada de todas las direcciones
        return response()->json([
            'addresses' => Address::paginate(10)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'address' => 'required|string|max:255',
            'zipcode' => 'required|string|max:20',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'x' => 'required|numeric',
            'y' => 'required|numeric',
        ]);
        // $validatedData['x'] = floatval($validatedData['x']); 
        // $validatedData['y'] = floatval($validatedData['y']);

        // $validatedData['x'] = (float) $validatedData['x'];
        // $validatedData['y'] = (float) $validatedData['y'];


        $address = Address::create($validatedData);
        return $address->id;
    }

    /**
     * Display the specified resource.
     */
    // ! Se cambio la forma de buscar Address de tal forma que que solo me mostraran los datos sin otros datos inecesarios como "original, headers, otro address anidad"
    // ! ---Oliver
    public function show(Request $request)
    {
        $address = Address::find($request->input('id_address'));
        return $address;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // $address = Address::find($request->input('id_address'));
        $id_address = $request->input('id_address');
        $address = Address::find($id_address);

        if (!$address) {
            return [
                'error' => 'Address not found'
            ];
        }
        $validatedData = $request->validate([
            'address' => 'nullable|string|max:255',
            'zipcode' => 'nullable|string|max:20',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'x' => 'required|numeric',
            'y' => 'required|numeric',
        ]);
        // $validatedData['x'] = floatval($validatedData['x']); 
        // $validatedData['y'] = floatval($validatedData['y']);
        // $validatedData['x'] = (float) $validatedData['x'];
        // $validatedData['y'] = (float) $validatedData['y'];
        
        $address->update($validatedData);
        return $address->id;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $id_address = $request->input('id_address');
            $address = Address::find($id_address);

            if (!$address) {
                // return ["addd" => $address];
                return ['status' => 'error'];
            }

            $address->delete();
            return ['status' => 'successfull'];
        } catch (\Exception $e) {
            return ['status' => 'error'];
        }
    }
}
