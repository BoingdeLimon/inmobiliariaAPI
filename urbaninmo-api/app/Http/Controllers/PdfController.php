<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\RealEstate;

class PdfController extends Controller
{
    public function generatePdf($id)
    {
        $rental = RealEstate::with(['address', 'photos'])->find($id);

        if (!$rental) {
            abort(404, 'Rental not found');
        }

        $pdf = PDF::loadView('rentals.generate-rental-pdf', ['rental' => $rental]);
        return $pdf->download($rental->title . '.pdf');
    }
}
