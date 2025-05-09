<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperheroController;

Route::resource('superheroes', SuperheroController::class);
Route::get('/superheroes/deleted', [SuperheroController::class, 'deleted'])->name('superheroes.deleted');
Route::post('/superheroes/{id}/restore', [SuperheroController::class, 'restore'])->name('superheroes.restore');