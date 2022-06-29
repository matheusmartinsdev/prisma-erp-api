<?php

namespace App\Http\Controllers;

use App\Models\Contratante;
use Illuminate\Http\Request;
use PDF;

class GerarPDFController extends Controller
{
    public function getContratantesPDF(Request $request)
    {
        $contratantes = Contratante::all();

        $pdf = PDF::loadView('contratantesPdf', ['contratantes' => $contratantes]);

        return $pdf->setPaper('a4', 'landscape')->stream('pdfContratantes.pdf');
    }
}
