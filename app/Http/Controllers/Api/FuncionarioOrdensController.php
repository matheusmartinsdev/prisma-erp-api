<?php

namespace App\Http\Controllers\Api;

use App\Models\Funcionario;
use Orion\Http\Controllers\RelationController;
use Orion\Concerns\DisableAuthorization;

class FuncionarioOrdensController extends RelationController
{
    use DisableAuthorization;

    protected $model = Funcionario::class;

    protected $relation = 'ordens';
}
