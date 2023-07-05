<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiBlogsController;



Route::resource('blogs', ApiBlogsController::class)->middleware('auth:api');
