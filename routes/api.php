<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('v1/login', [LoginJwtController::class, 'login']);
Route::middleware(['jwt.auth'])->group(function () {
    Route::resource('v1/pet', PetController::class);
});

Route::resource('v1/higiene', HigieneController::class);
Route::resource('v1/medicamento', MedicamentoController::class);
Route::resource('v1/operacao', OperacaoController::class);
Route::resource('v1/raca', RacaController::class);
Route::resource('v1/sinais', SinalVitalController::class);
Route::resource('v1/user', UserController::class);
Route::resource('v1/session', SessionController::class);
Route::resource('v1/feedback', FeedbackController::class);







