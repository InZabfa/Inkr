<?php
use App\Http\Controllers\TattooController;

Route::get('/tattoos', [TattooController::class, 'index']);
Route::post('/tattoos', [TattooController::class, 'store']);

