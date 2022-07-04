<?php

namespace App\Http\Controllers;

use App\Models\Contratante;
use Illuminate\Http\Request;
use PDF;

class GerarPDFController extends Controller
{
    private $entidade;
    private $model;
    private $pdf;

    public function __construct(Request $request)
    {
        $this->entidade = $request->input('tipo');
        $this->model = "\\App\\Models\\" . ucfirst($this->entidade);
        $this->pdf = PDF::loadview($this->entidade . 'sPdf', [$this->entidade . 's' => (new $this->model)->all()])
            ->setPaper('a4', 'landscape')->stream('pdf' . $this->entidade . '.pdf');
    }

    public function getPDF()
    {
        return $this->pdf;
    }
}
