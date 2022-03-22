<?php

use Illuminate\Support\Facades\Route;
use Orion\Facades\Orion;
use App\Http\Controllers\Api\PostsController;

Route::group(['as' => 'api.'], function () {
    Orion::resource('contratantes', ContratantesController::class);
});
