<?php

namespace App\Http\Controllers\Api;

use App\Models\Contratante;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;

class ContratantesController extends Controller
{
    use DisableAuthorization;

    protected $model = Contratante::class;

    public function exposedScopes(): array
    {
        return ['comOrdensCount'];
    }
}
