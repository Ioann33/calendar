<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/calendar', [\App\Http\Controllers\ApiController::class, 'save'])->name('save.event');

Route::get('/calendar/{first?}/{second?}', [\App\Http\Controllers\ApiController::class, 'get'])->name('get.events');

Route::patch('/calendar/{id?}', [\App\Http\Controllers\ApiController::class, 'update'])->name('update.event');

Route::delete('/calendar/{id?}', function ($id){
    $delete = new \App\Http\Controllers\ApiController();
    $delete->delete($id);
});
