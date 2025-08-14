<?php

use App\Http\Controllers\CargoController;
use App\Http\Controllers\FuncionarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('cargos', [CargoController::class, 'index']);
Route::post('cargos', [CargoController::class, 'store']);
Route::put('/cargos/{cargo}', [CargoController::class, 'update']);
Route::delete('/cargos/{cargo}', [CargoController::class, 'destroy']);

Route::get('funcionarios', [FuncionarioController::class, 'index']);
Route::post('/cargos/{cargo}/funcionario', [FuncionarioController::class,  'store']);
Route::delete('/cargos/{cargo}/funcionario/{funcionario}', [FuncionarioController::class,  'destroy']);
Route::put('/cargos/{cargo}/funcionario/{funcionario}', [FuncionarioController::class,  'update']);

