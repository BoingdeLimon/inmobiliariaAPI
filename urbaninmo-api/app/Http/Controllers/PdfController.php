<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\RealEstate;

class PdfController extends Controller
{
    public function generatePdf($id)
    {
        $baseUrl = env('WINDOW_LOCATION_ORIGIN', 'http://localhost:8000/');
        $rental = RealEstate::with(['address', 'photos'])->find($id);

        if (!$rental) {
            abort(404, 'Rental not found');
        }
        $qrUrl = 'https://api.qrserver.com/v1/create-qr-code/?size=120x120&data=' . urlencode($baseUrl . $rental->id);

        // Fetch the image and convert to base64
        $imageData = base64_encode(file_get_contents($qrUrl));
        $base64Image = 'data:image/png;base64,' . $imageData;

        // Pass the base64 image to the view
        $pdf = PDF::loadView('rentals.generate-rental-pdf', ['rental' => $rental, 'base64Image' => $base64Image]);
        return $pdf->download($rental->title . '.pdf');
    }
}
