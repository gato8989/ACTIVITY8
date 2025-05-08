<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperheroController;

Route::resource('superheroes', SuperheroController::class);