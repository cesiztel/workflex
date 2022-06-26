<?php

use App\Http\Api\Controllers\ApplicationController;
use App\Http\Api\Controllers\CompanyController;
use App\Http\Api\Controllers\GigCategoryController;
use App\Http\Api\Controllers\GigController;
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

// Endpoints for the main website
Route::get('/categories', [GigCategoryController::class, 'index']);
Route::resource('/gigs', GigController::class)
    ->only('index', 'show');
Route::resource('/companies', CompanyController::class)
    ->only('index', 'show');
Route::post('/gigs/{id}/apply', [ApplicationController::class, 'store']);