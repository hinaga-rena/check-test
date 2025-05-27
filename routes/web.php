<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ContactController;

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

Route::prefix('admin')->group(function () {
    Route::get('/contacts', [ContactController::class, 'index'])->name('admin.contacts.index');
});

Route::get('/admin', [ContactController::class, 'index'])->name('admin.index');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('index');
    Route::get('/export', [ContactController::class, 'export'])->name('export');
    Route::get('/{id}', [ContactController::class, 'show'])->name('show');
    Route::delete('/{id}', [ContactController::class, 'destroy'])->name('destroy');
});

Route::delete('/admin/{id}', [ContactController::class, 'destroy'])->name('admin.destroy');