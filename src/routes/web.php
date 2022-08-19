<?php

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//  admin -------------------------------------------------

Route::prefix('admin')->name('admin.')->group(function(){

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['auth:admins'])->name('dashboard');
    
    require __DIR__.'/admin.php';
});

//  teacher -------------------------------------------------

Route::prefix('teacher')->name('teacher.')->group(function(){

    Route::get('/dashboard', function () {
        return view('teacher.dashboard');
    })->middleware(['auth:teachers'])->name('dashboard');
    
    require __DIR__.'/teacher.php';
});