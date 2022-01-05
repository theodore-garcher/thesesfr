<?php

use App\Http\Controllers\CartoController;
use App\Http\Controllers\GraphsController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/import', [ImportController::class, 'index'])->name('index.import');
Route::post('/file-import', [ImportController::class, 'fileImport'])->name('file-import');
Route::get('/graphiques', [GraphsController::class, 'index'])->name('graphiques');
Route::get('/carte', [CartoController::class, 'index'])->name('carte');
