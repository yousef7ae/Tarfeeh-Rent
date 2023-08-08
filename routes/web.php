<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

//
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('admin/login', \App\Livewire\Admin\Login::class)->name('admin.login');
Route::get('admin/logout', \App\Livewire\Admin\Login::class)->name('admin.logout');


Route::middleware('auth')->group(function (){
    Route::get('/home', \App\Livewire\Admin\Home::class)->name('admin.home');
});

Route::middleware('localization')->group(function () {

    Route::prefix('users')->group(function (){
        Route::get('/', \App\Livewire\Admin\users\users::class)->middleware('permission:users show')->name('admin.users');
    });
    Route::get('/service_categories' , \App\Livewire\Admin\ServiceCategories\ServiceCategories::class)->middleware('permission:users show')->name('admin.service_categories');
    Route::get('/services' , \App\Livewire\Admin\Services\Services::class)->middleware('permission:users show')->name('admin.services');
    Route::get('/products', \App\Livewire\Admin\Products\Products::class)->middleware('permission:users show')->name('admin.products');


});





//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

require __DIR__.'/auth.php';
