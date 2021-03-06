<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
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

Route::prefix('/project')->group(function () {
    Route::get('/get-data', [ProjectController::class, "getData"]);
    Route::get('/up-data', [ProjectController::class, "upData"]);
    Route::post('/get-values', [ProjectController::class, "getValues"]);
});







