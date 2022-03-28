<?php

namespace App\Http\Controllers\Api;

use App\Models\Contratante;
use Orion\Http\Controllers\Controller;

class ContratanteOrdensController extends Controller
{
    protected $model = Contratante::class;

    protected $relation = 'servicos';
}
