<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SyUserController;


Route::get('login',[SyUserController::class, 'login'])->name('login');
Route::post('login',[SyUserController::class, 'authenticate'])->name('authenticate');

Route::get('register',[SyUserController::class, 'register'])->name('register');
Route::post('register',[SyUserController::class, 'store'])->name('store');

Route::middleware(['auth'])->group(function() {
    
    Route::get('/', function() {
        return redirect(route('products.index'));
    });

    Route::resource('products', ProductController::class);
    Route::post('logout',[SyUserController::class, 'logout'])->name('logout');

});

