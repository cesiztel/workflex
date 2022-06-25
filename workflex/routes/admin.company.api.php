<?php

use App\Http\Api\Admin\Controllers\CompanyController;
use App\Http\Api\Admin\Controllers\GigController;
use App\Http\Api\Admin\Controllers\RatingController;
use Illuminate\Support\Facades\Route;

Route::get('/profile', [CompanyController::class, 'index']);
Route::post('/gigs', [GigController::class, 'store']);
Route::patch('/gigs/{id}/publish', [GigController::class, 'update']);
Route::post('/gigs/{id}/rate', [RatingController::class, 'store']);