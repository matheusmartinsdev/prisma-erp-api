<?php

namespace App\Http\Controllers\Api;

use App\Models\OrdemServico;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;

class OrdensServicoController extends Controller
{
    use DisableAuthorization;

    protected $model = OrdemServico::class;
}
