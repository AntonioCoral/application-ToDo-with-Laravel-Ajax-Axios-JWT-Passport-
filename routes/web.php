<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\AuthController;

Route::get('/', [NotesController::class,'index']);
Route::post('/', [NotesController::class,'store']);
Route::get('/login', function () {
    return 'Login page';
})->name('login');



