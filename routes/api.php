<?php

use App\Http\Controllers\Api\FuncionariosController;
use App\Http\Controllers\Api\ContratantesController;
use App\Http\Controllers\Api\OrdensServicoController;
use App\Http\Controllers\GerarPDFController;
use Illuminate\Support\Facades\Route;
use Orion\Facades\Orion;
use Illuminate\Http\Request;

Route::middleware('auth:sanctum')->group(function () {
    // Devolver dados de usuário
    Route::get("/eu", fn (Request $request) => $request->user());

    Route::group(['as' => 'api.'], function () {
        Orion::resource('servicos', OrdensServicoController::class)->except(["create", "edit"]);
        Orion::resource('contratantes', ContratantesController::class)->except(["create", "edit"]);
        Orion::resource('funcionarios', FuncionariosController::class)->except(["create", "edit"]);

        // Ordens de serviço por tipo
        Route::get('/servicos-por-tipo', [OrdensServicoController::class, 'getOrdensPorTipo']);

        // Ordens de serviço por natureza
        Route::get('/servicos-por-natureza', [OrdensServicoController::class, 'getOrdensPorNatureza']);

        //PDF
        Route::get('/pdf', [GerarPDFController::class, 'getPDF']);
    });
});
