<?php

namespace App\Http\Controllers\Api;

use App\Models\OrdemServico;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\RelationController;

class OrdemContratanteController extends RelationController
{
    use DisableAuthorization;

    protected $model = OrdemServico::class;

    protected $relation = 'contratante';
}
