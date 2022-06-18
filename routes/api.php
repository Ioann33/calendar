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
Route::middleware('auth_api')->post('/calendar', [\App\Http\Controllers\ApiController::class, 'save'])->name('save.event');

Route::middleware('auth_api')->get('/calendar/{first?}/{second?}', [\App\Http\Controllers\ApiController::class, 'get'])->name('get.events');

Route::middleware('auth_api')->patch('/calendar/{id?}', function ($id, Request $request){
    $update = new \App\Http\Controllers\ApiController();

    $update->update($request->toArray(), $id);

})->name('update.event');

Route::middleware('auth_api')->delete('/calendar/{id?}', function ($id){
    $delete = new \App\Http\Controllers\ApiController();
    $delete->delete($id);
});
