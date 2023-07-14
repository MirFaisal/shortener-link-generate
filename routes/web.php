<?php

use App\Http\Controllers\ShortenerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('generate-link', [ShortenerController::class, 'index']);
Route::post('generate-link-create', [ShortenerController::class, 'create'])->name('create.link');
Route::get('{code}', [ShortenerController::class, 'shortenerLink'])->name('shortener.link');