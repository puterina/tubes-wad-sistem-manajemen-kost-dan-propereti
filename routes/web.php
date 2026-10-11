<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\HousekeeperController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('assets.index');
});
Route::resource('housekeepers', HousekeeperController::class)->except('show');
Route::resource('assets', AssetController::class)->except('show');
