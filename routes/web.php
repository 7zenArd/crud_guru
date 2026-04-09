<?php

use App\Http\Controllers\GuruController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('guru.index');
});

Route::resource('guru', GuruController::class)->only([
    'index', 'store', 'update', 'destroy',
]);
