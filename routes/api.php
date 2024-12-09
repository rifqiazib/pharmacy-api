<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\MedicineCategoryController;
use App\Http\Controllers\API\MedicineController;
use App\Http\Middleware\JwtMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::group(['prefix' => 'auth'], function () {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::middleware([JwtMiddleware::class])->prefix('medicine')->group(function () {

    Route::get('/', [MedicineController::class, 'index'])->name('medicine.index');
    Route::post('/store', [MedicineController::class, 'store'])->name('medicine.store');
    Route::get('/{id}', [MedicineController::class, 'show'])->name('medicine.show');
    Route::put('/update/{id}', [MedicineController::class, 'update'])->name('medicine.update');
    Route::delete('/delete/{id}', [MedicineController::class, 'destroy'])->name('medicine.delete');

    // Category Section
    Route::group(['prefix' => 'category'], function () {
        Route::get('/', [MedicineCategoryController::class, 'index'])->name('medicine.category.index');
        Route::post('/store', [MedicineCategoryController::class, 'store'])->name('medicine.category.create');
        Route::get('/{id}', [MedicineCategoryController::class, 'show'])->name('medicine.category.show');
        Route::put('/update/{id}', [MedicineCategoryController::class, 'update'])->name('medicine.category.update');
        Route::delete('/delete/{id}', [MedicineCategoryController::class, 'destroy'])->name('medicine.category.delete');
    });
});
