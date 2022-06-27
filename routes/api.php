<?php

use App\Http\Controllers\Api\OrdemFuncionarioController;
use App\Http\Controllers\Api\OrdemContratanteController;
use App\Http\Controllers\Api\FuncionarioOrdensController;
use App\Http\Controllers\Api\FuncionariosController;
use App\Http\Controllers\Api\ContratantesController;
use App\Http\Controllers\Api\OrdensServicoController;
use Illuminate\Support\Facades\Route;
use Orion\Facades\Orion;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Route::middleware('auth:sanctum')->group(function () {
    // Devolver dados de usuário
    Route::get("/eu", fn (Request $request) => $request->user());

    Route::group(['as' => 'api.'], function () {
        Orion::resource('/contratantes', ContratantesController::class)->except(["create", "edit"]);
        Orion::resource('/servicos', OrdensServicoController::class)->except(["create", "edit"]);

        // Funcionários
        Orion::resource('/funcionarios', FuncionariosController::class)->except(["create", "edit"]);

        // Funcionários do tipo 'técnico'
        Route::get('/tecnicos', [FuncionariosController::class, 'getTecnicos']);

        // Ordens de serviço por tipo
        Route::get('/servicos-por-tipo', [OrdensServicoController::class, 'getOrdensPorTipo']);

        // Número de ordens por técnico
        Route::get('/tecnicos/ordens', [FuncionariosController::class, 'getTecnicosOrdens']);

        // Ordens de serviço vinculadas à um funcionário
        Orion::hasManyResource('funcionarios', 'ordens', FuncionarioOrdensController::class);

        // Orion::hasOneResource('servicos', 'tecnico', OrdemFuncionarioController::class);

        // Funcionário vinculado à uma ordem de serviço
        // Orion::belongsToResource('ordem', 'funcionario', OrdemFuncionarioController::class);

        // Número de ordens por contratante
        Route::get('/clientes/ordens', [ContratantesController::class, 'getContratantesOrdens']);
    });

    // // Logout
    // Route::post("/logout", function (Request $request) {
    //     if ($request->user()->tokens()->delete()) {
    //         return response(status: 204);
    //     }

    //     return response()->json([
    //         'message' => 'Internal Server Error!'
    //     ], status: 500);
    // });
});

// // Login
// Route::post("/login", function (Request $request) {
//     $credentials = $request->validate(
//         [
//             'email' => ['required', 'email'],
//             'password' => ['required']
//         ]
//     );

//     if (Auth::attempt($credentials)) {

//         $user = \App\Models\User::where('id', Auth::user()->id)->first();

//         return response()->json(new UserResource($user));
//     }

//     return response()->json(['message' => 'Credenciais inválidas'], status: 422);
// });
