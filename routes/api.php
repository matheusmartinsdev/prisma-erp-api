<?php

use App\Http\Controllers\Api\ContratanteOrdensController;
use App\Http\Controllers\Api\FuncionariosController;
use App\Http\Controllers\Api\ContratantesController;
use App\Http\Controllers\Api\OrdensServicoController;
use Illuminate\Support\Facades\Route;
use Orion\Facades\Orion;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;

Route::middleware('auth:sanctum')->group(function () {
    // Devolver dados de usuário
    Route::get("/eu", fn () => response()->json(Auth::user()));

    Route::group(['as' => 'api.'], function () {
        Orion::resource('/contratantes', ContratantesController::class)->except(["create", "edit"]);
        Orion::resource('/servicos', OrdensServicoController::class)->except(["create", "edit"]);
        Orion::resource('/funcionarios', FuncionariosController::class)->except(["create", "edit"]);

        Orion::hasManyResource('/contratantes', '/servicos', ContratanteOrdensController::class)->except(["create", "edit"]);
    });
});
