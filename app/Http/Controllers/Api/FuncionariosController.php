<?php

namespace App\Http\Controllers\Api;

use App\Models\Funcionario;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;

class FuncionariosController extends Controller
{
    use DisableAuthorization;

    protected $model = Funcionario::class;

    public function getTecnicos()
    {
        $tecnicos = Funcionario::query()->where('tipo', 'tecnico')->get();
        return response()->json($tecnicos);
    }

    public function getTecnicosOrdens()
    {
        $tecnicos = Funcionario::comOrdensCount()->get();

        return response()->json($tecnicos);
    }
}
