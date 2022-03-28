<?php

namespace App\Http\Controllers\Api;

use App\Models\Funcionario;
use Illuminate\Support\Facades\Auth;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;

class FuncionariosController extends Controller
{
    use DisableAuthorization;

    protected $model = Funcionario::class;
}
