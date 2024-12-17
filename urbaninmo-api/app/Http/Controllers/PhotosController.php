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

    public function newImageUser(Request $request)
    {
        $oldPhoto = $request->oldPhoto;
        if ($oldPhoto) {
            Storage::disk('public')->delete('photos/' . $oldPhoto);
        }
        $image = $request->photo;
        $extension = $this->getB64Type($image);
        if ($extension === 'unknown') {
            return "unknown";
        }
        $image = preg_replace('/^data:image\/\w+;base64,/', '', $image);
        $file = base64_decode($image);
        if ($file === false) {
            return response()->json(['error' => 'La imagen no pudo ser decodificada'], 400);
        }
        $filename = 'photo-' . time() . '.' . $extension;
        $filePath = Storage::disk('public')->put('photos/' . $filename, $file);
        return $filename;
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








    public function deleteSpecificPhoto(Request $request)
    {
        $photo = $request->input('photo');
        $photo = Photos::where('photo', $photo)->first();
        if (!$photo) {
            return ['status' => 'error', 'message' => $photo];
        }
        $photo->delete();
        return ['status' => 'successful'];
    }


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
