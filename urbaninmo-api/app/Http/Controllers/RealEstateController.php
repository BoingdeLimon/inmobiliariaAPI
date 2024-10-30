<?php

namespace App\Http\Controllers;

use App\Models\RealEstate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
