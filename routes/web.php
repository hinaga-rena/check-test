<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\ContactController;

// ▼ 管理画面ルート（/admin/...）
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminContactController::class, 'index'])->name('index');
    Route::get('/contacts', [AdminContactController::class, 'index'])->name('contacts.index');
    Route::get('/export', [AdminContactController::class, 'export'])->name('export');
    Route::get('/{id}', [AdminContactController::class, 'show'])->name('show');
    Route::delete('/{id}', [AdminContactController::class, 'destroy'])->name('destroy');
});

// ▼ フロント：お問い合わせフォーム関連
Route::get('/', [ContactController::class, 'create'])->name('contact.create');
Route::post('/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');
Route::post('/store', [ContactController::class, 'store'])->name('contact.store');
Route::get('/thanks', [ContactController::class, 'thanks'])->name('contact.thanks');