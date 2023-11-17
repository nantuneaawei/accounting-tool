<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Track\TrackController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['CheckUID'])->group(function () {
    Route::get('/index', [TrackController::class, 'index'])->name('index');
    Route::get('/in', [TrackController::class, 'in'])->name('in');
    Route::get('/record', [TrackController::class, 'record'])->name('record');
});

Route::post('/createOut', [TrackController::class, 'createOut']);

Route::post('/createIn', [TrackController::class, 'createIn']);

Route::post('/logout', [TrackController::class, 'logout']);

Route::delete('/deleteIn', [TrackController::class, 'deleteIn']);