<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photos;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    // ! Este controller se hizo para hacer codigo fuera de RealEstateController
    public function index()
    {
        $photos = Photos::all();
        return response()->json($photos);
    }
    public function newImage(Request $request)
    {
        // $request->validate([
        //     'photo' => 'required|string',
        // ]);
        $image = $request->photo;
        $extension = $this->getB64Type($image);
        if ($extension === 'unknown') {
            return response()->json(['error' => 'Formato de imagen no válido'], 400);
        }
        $image = preg_replace('/^data:image\/\w+;base64,/', '', $image);
        $file = base64_decode($image);
        if ($file === false) {
            return response()->json(['error' => 'La imagen no pudo ser decodificada'], 400);
        }
        $filename = 'photo-' . time() . '.' . $extension;
        $filePath = Storage::disk('public')->put('photos/' . $filename, $file);
        $photo = new Photos();
        $photo->photo = $filename;
        $photo->id_real_estate = $request->id_real_estate;
        $photo->save();

        return response()->json([
            "photo" => $photo,
        ]);
    }

    private function getB64Type($image)
    {
        $types = [
            'data:image/png;base64' => 'png',
            'data:image/jpeg;base64' => 'jpg',
            'data:image/gif;base64' => 'gif',
        ];
        $image = trim($image);
        foreach ($types as $type => $extension) {
            if (str_starts_with($image, $type)) {
                return $extension;
            }
        }
        return 'unknown';
    }




    public function store(Request $request)
    {
        $request->validate([
            'id_real_estate' => 'required|exists:real_estate,id',
            'photo' => 'required|string',
        ]);

        $photo = Photos::create([
            'id_real_estate' => $request->id_real_estate,
            'photo' => $request->photo,
        ]);

        return response()->json($photo, 201);
    }

    public function show(Request $request)
    {
        $photos = Photos::where('id_real_estate', $request->input('id_real_estate'))->get();
        return $photos;
    }



    public function updatePhoto(Request $request)
    {
        $data = $request->validate([
            'photo' => 'string',
        ]);
        $id_real_estate = $request->input('id_real_estate');


        try {
            Photos::where('id_real_estate', $id_real_estate)->delete();
            foreach ($data['photo'] as $photoUrl) {
                Photos::create([
                    'id_real_estate' => $id_real_estate,
                    'photo' => $photoUrl,
                ]);
            }

            return ['status' => 'successfull'];
        } catch (\Exception $e) {
            return ['status' => 'error'];
        }
    }
    public function checkAndAddPhoto(Request $request)
    {
        $request->validate([
            'id_real_estate' => 'required|exists:real_estate,id',
            'photo' => 'required|string',
        ]);

        $existingPhoto = Photos::where('id_real_estate', $request->id_real_estate)
                                ->where('photo', $request->photo)
                                ->first();

        if ($existingPhoto) {
            return response()->json(['message' => 'La foto ya existe'], 200);
        } else {
            return $this->newImage($request);
        }
    }




    public function deleteSpecificPhoto(Request $request) {}


    public function deleteAllPhotos(Request $request)
    {
        try {
            $id_real_estate = $request->input('id_real_estate');
            $photos = Photos::where('id_real_estate', $id_real_estate)->get();

            if (!$photos) {
                return ['status' => 'error'];
            }

            foreach ($photos as $photo) {
                $photo->delete();
            }

            return ['status' => 'successfull'];
        } catch (\Exception $e) {
            return ['status' => 'error'];
        }
    }
}
