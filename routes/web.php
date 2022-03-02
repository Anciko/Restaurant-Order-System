<?php

use App\Http\Controllers\DishController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', [OrderController::class, 'index'])->name('home');
Route::post('/order',[OrderController::class, 'submit'] )->name('order_submit');

Route::resource('/dishes', DishController::class );
Route::get('order',  [DishController::class, 'order'])->name('kitchen_order');
Route::get('order/{order}/approve', [DishController::class, 'approve'])->name('order_approve');
Route::get('order/{order}/cancel', [DishController::class, 'cancel'])->name('order_cancel');
Route::get('order/{order}/ready', [DishController::class, 'ready'])->name('order_ready');

Route::get('order/{order}/serve', [OrderController::class, 'serve'])->name('order_serve');


Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
    'confirm' => false
]);

