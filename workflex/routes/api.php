<?php

use App\Http\Api\Controllers\ApplicationController;
use App\Http\Api\Controllers\CompanyController;
use App\Http\Api\Controllers\GigCategoryController;
use App\Http\Api\Controllers\GigController;
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

Route::post('/sanctum/token', [\App\Http\Api\Shared\UserController::class, 'store']);

// Endpoints for the main website
Route::get('/categories', [GigCategoryController::class, 'index']);
Route::resource('/gigs', GigController::class)
    ->only('index', 'show');
Route::resource('/companies', CompanyController::class)
    ->only('index', 'show');
Route::middleware('auth:sanctum')
    ->post('/gigs/{id}/apply', [ApplicationController::class, 'store']);