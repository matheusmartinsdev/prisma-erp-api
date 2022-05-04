<?php

use App\Http\Controllers\Api\ContratanteOrdensController;
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
    // Route::get("/eu", fn () => response()->json(Auth::user()->createToken('app-token')->plainTextToken));

    Route::group(['as' => 'api.'], function () {
        Orion::resource('/contratantes', ContratantesController::class)->except(["create", "edit"]);
        Orion::resource('/ordens', OrdensServicoController::class)->except(["create", "edit"]);
        Orion::resource('/funcionarios', FuncionariosController::class)->except(["create", "edit"]);

        Orion::hasManyResource('/contratantes', '/servicos', ContratanteOrdensController::class)->except(["create", "edit"]);
    });

    // Logout
    Route::post("/logout", function (Request $request) {
        if ($request->user()->tokens()->delete()) {
            return response(status: 204);
        }

        return response()->json([
            'message' => 'Internal Server Error!'
        ], status: 500);
    });
});

// Login
Route::post("/login", function (Request $request) {
    $credentials = $request->validate(
        [
            'email' => ['required', 'email'],
            'password' => ['required']
        ]
    );

    if (Auth::attempt($credentials)) {

        $user = \App\Models\User::where('id', Auth::user()->id)->first();

        return response()->json(new UserResource($user));
    }

    return response()->json(['message' => 'Credenciais inválidas'], status: 422);
});
