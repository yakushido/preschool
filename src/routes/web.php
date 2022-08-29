<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EvaluationController;

use App\Http\Controllers\Teacher\TeacherDashboardController;
use App\Http\Controllers\Teacher\BlogController;
use App\Http\Controllers\Teacher\PhotoController;
use App\Http\Controllers\Teacher\EventController;


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

Route::get('/',[HomeController::class,'index'])->name('index');
Route::get('/event/detail/{id}',[EventController::class,'event_detail'])->name('event.detail');
Route::get('/blog/detail/{id}',[BlogController::class,'detail'])->name('blog.detail');

// user --------------------------------------------------------------------

Route::get('/dashboard/{year?}/{month?}', [DashboardController::class,'get'])->name('dashboard');

Route::post('/attentance/add',[AttendanceController::class,'add'])->name('attendance.add');
Route::post('/attendance/delete',[AttendanceController::class,'delete'])->name('attendance.delete');
Route::get('/attendance/another_day',[AttendanceController::class,'another_day_get']);
Route::post('/attendance/update/{id}',[AttendanceController::class,'update'])->name('attendance.update');

Route::post('/blog/evaluation/add/{id}',[EvaluationController::class,'add'])->name('evaluation.add');
Route::post('/blog/evaluation/update/{id}',[EvaluationController::class,'update'])->name('evaluation.update');


require __DIR__.'/auth.php';

//  admin -------------------------------------------------------------------

Route::prefix('admin')->name('admin.')->middleware('auth:admins')->group(function(){

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['auth:admins'])->name('dashboard');
    
    require __DIR__.'/admin.php';
});

//  teacher -------------------------------------------------------------------

Route::prefix('teacher')->name('teacher.')->group(function(){

    Route::middleware('auth:teachers')->group(function () {

    Route::get('/dashboard',[TeacherDashboardController::class,'index'])->name('dashboard');

    Route::get('/user_detail/{id}/{year?}/{month?}',[TeacherDashboardController::class,'user_detail'])->name('user_detail');

    Route::get('/blog',[BlogController::class,'index'])->name('blog');
    Route::post('/blog/add',[BlogController::class,'add'])->name('blog.add');
    Route::post('/blog/delete/{id}',[BlogController::class,'delete'])->name('blog.delete');
    Route::get('/blog/detail/{id}',[BlogController::class,'teacher_detail'])->name('blog.detail');
    Route::post('/blog/update/{id}',[BlogController::class,'update'])->name('blog.update');

    Route::get('/photo',[PhotoController::class,'index'])->name('photo');
    Route::post('/photo/add',[PhotoController::class,'add'])->name('photo.add');
    Route::post('/photo/delete/{id}',[PhotoController::class,'delete'])->name('photo.delete');

    Route::get('/event/get_add/{id}',[EventController::class,'get_add'])->name('event.get_add');
    Route::post('/event/add/{id}',[EventController::class,'add'])->name('event.add');
    Route::post('/event/delete/{id}',[EventController::class,'delete'])->name('event.delete');
    Route::get('/event/create_get',[EventController::class,'create_get'])->name('event.create_get');
    Route::post('/event/create',[EventController::class,'create'])->name('event.create');
    Route::post('/event/create_update/{id}',[EventController::class,'update'])->name('event.update');
    Route::post('/event/create_delete/{id}',[EventController::class,'create_delete'])->name('event.create_delete');
    Route::get('/event/{year?}/{month?}', [EventController::class,'get'])->name('event');
    // Route::get('/event',[EventController::class,'get'])->name('event.get');

    });
    
    require __DIR__.'/teacher.php';
});
