<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

Route::get('/form', [FormController::class, 'index'])->name('form.index');
Route::post('/form/check', [FormController::class, 'check'])->name('form.check');
Route::post('/form/store', [FormController::class, 'store'])->name('form.store');
Route::get('/manage', [FormController::class, 'manage'])->name('form.manage');
Route::post('/manage/find', [FormController::class, 'find'])->name('manage.find');
Route::post('/manage/delete', [FormController::class, 'delete'])->name('manage.delete');