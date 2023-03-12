<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CrudController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });




Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::get('crud', [CrudController::class, 'index']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('create', [CrudController::class, 'create']);
    Route::put('update/{id}', [CrudController::class, 'update']);
    Route::delete('delete/{id}', [CrudController::class, 'delete']);
    Route::get('logout', [AuthController::class, 'logout']);
});

