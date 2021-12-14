<?php

use App\Http\Controllers\API\PenjualanController;
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

Route::get('/', function () {
	return view('welcome');
});


// Route::get('/penjualan', [PenjualanController::class, 'index'])->name('penjualan.index');

// Route::post('/penjualan', [PenjualanController::class, 'store'])->name('penjualan.store');
