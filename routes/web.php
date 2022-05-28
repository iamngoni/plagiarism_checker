<?php

use App\Http\Controllers\CopyLeaksController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();


Route::prefix('student')->middleware('auth')->group(function () {
    Route::get('', [StudentController::class, 'home'])->name('student.home');
    Route::post('upload', [CopyLeaksController::class, 'uploadFile'])->name('student.upload');
    Route::get('download/{id}', [CopyLeaksController::class, 'downloadFile'])->name('student.download');
});

