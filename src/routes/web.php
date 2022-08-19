<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\Teacher\TeacherDashboardController;
use App\Http\Controllers\Teacher\BlogController;


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

Route::get('/',[HomeController::class,'index']);

// user --------------------------------------------------------------------

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//  admin -------------------------------------------------------------------

Route::prefix('admin')->name('admin.')->group(function(){

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['auth:admins'])->name('dashboard');
    
    require __DIR__.'/admin.php';
});

//  teacher -------------------------------------------------------------------

Route::prefix('teacher')->name('teacher.')->group(function(){

    Route::get('/dashboard',[TeacherDashboardController::class,'index']);
    Route::get('/blog',[BlogController::class,'index'])->name('blog');
    Route::post('/blog/add',[BlogController::class,'add'])->name('blog.add');
    
    require __DIR__.'/teacher.php';
});