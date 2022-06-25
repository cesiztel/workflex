<?php

use App\Http\Api\Admin\Controllers\RatingController;
use App\Http\Api\Admin\Controllers\WorkerController;
use App\Http\Api\Admin\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;

Route::get('/profile', [WorkerController::class, 'index']);
Route::get('/applications', [ApplicationController::class, 'index']);
Route::post('/gigs/{id}/rate', [RatingController::class, 'store']);