<?php

use App\Http\Controllers\UnivController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenghuniController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register/store', [LoginController::class, 'store'])->name('store');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('admin')->group(function () {
  Route::get('/dashboard', [PenghuniController::class, 'index'])->name('dashboard');
  Route::get('/penghuni/create', [PenghuniController::class, 'create'])->name('penghuni.create');
  Route::post('/penghuni/store', [PenghuniController::class, 'store'])->name('penghuni.store');
  Route::get('/penghuni/{id}/edit', [PenghuniController::class, 'edit'])->name('penghuni.edit');
  Route::put('/penghuni/{id}', [PenghuniController::class, 'update'])->name('penghuni.update');
  Route::delete('/penghuni/{id}', [PenghuniController::class, 'destroy'])->name('penghuni.destroy');

  Route::get('/penghuni/pdf', [PenghuniController::class, 'pdf'])->name('penghuni.pdf');

  Route::get('/kamar', [KamarController::class, 'index'])->name('kamar.index');
  Route::get('/kamar/create', [KamarController::class, 'create'])->name('kamar.create');
  Route::post('/kamar/store', [KamarController::class, 'store'])->name('kamar.store');
  Route::get('/kamar/{id}/edit', [KamarController::class, 'edit'])->name('kamar.edit');
  Route::put('/kamar/{id}', [KamarController::class, 'update'])->name('kamar.update');
  Route::delete('/kamar/{id}', [KamarController::class, 'destroy'])->name('kamar.destroy');

  Route::get('/univ', [UnivController::class, 'index'])->name('univ.index');
  Route::get('/univ/create', [UnivController::class, 'create'])->name('univ.create');
  Route::post('/univ/store', [UnivController::class, 'store'])->name('univ.store');
  Route::get('/univ/{id}/edit', [UnivController::class, 'edit'])->name('univ.edit');
  Route::put('/univ/{id}', [UnivController::class, 'update'])->name('univ.update');
  Route::delete('/univ/{id}', [UnivController::class, 'destroy'])->name('univ.destroy');
});








