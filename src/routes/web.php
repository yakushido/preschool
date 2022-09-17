<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\PaymentController;

use App\Http\Controllers\Teacher\TeacherDashboardController;
use App\Http\Controllers\Teacher\TeacherAttendanceController;
use App\Http\Controllers\Teacher\BlogController;
use App\Http\Controllers\Teacher\PhotoController;
use App\Http\Controllers\Teacher\EventController;
use App\Http\Controllers\Teacher\MailController;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\EditTeacherController;
use App\Http\Controllers\Admin\EditAdminController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;


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
Route::get('/qrcode',[HomeController::class,'qrcode']);

// user --------------------------------------------------------------------

Route::middleware('auth:users', 'verified')->group(function () {

    Route::get('/dashboard/{year?}/{month?}', [DashboardController::class,'get'])->name('dashboard');

    Route::post('/attentance/add/{id}',[AttendanceController::class,'add'])->name('attendance.add');
    Route::post('/attendance/delete/{id}/{date}',[AttendanceController::class,'delete'])->name('attendance.delete');
    Route::get('/attendance/another_day',[AttendanceController::class,'another_day_get']);
    Route::post('/attendance/update/{id}',[AttendanceController::class,'update'])->name('attendance.update');

    Route::post('/blog/evaluation/add/{id}',[EvaluationController::class,'add'])->name('evaluation.add');
    Route::post('/blog/evaluation/update/{id}',[EvaluationController::class,'update'])->name('evaluation.update');

    Route::get('/photo/{id}/shop',[PhotoController::class,'photo_shop_index']);

    Route::post('/pay',[PaymentController::class,'pay']);

});

require __DIR__.'/auth.php';

//  admin -------------------------------------------------------------------

Route::prefix('admin')->name('admin.')->group(function(){

    Route::middleware('auth:admins', 'verified')->group(function () {

    Route::get('/dashboard',[AdminDashboardController::class,'index'])->name('dashboard');

    Route::get('/edit_teacher',[EditTeacherController::class,'index']);
    Route::post('/edit_teacher/update/{id}',[EditTeacherController::class,'update'])->name('teacher_update');
    Route::post('/edit_teacher/delete/{id}',[EditTeacherController::class,'delete'])->name('teacher_delete');

    Route::get('/edit_admin',[EditAdminController::class,'index']);
    Route::post('/edit_admin/update/{id}',[EditAdminController::class,'update'])->name('admin_update');
    Route::post('/edit_admin/delete/{id}',[EditAdminController::class,'delete'])->name('admin_delete');

    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);


    });

    require __DIR__.'/admin.php';
});

//  teacher -------------------------------------------------------------------

Route::prefix('teacher')->name('teacher.')->group(function(){

    Route::middleware('auth:teachers', 'verified')->group(function () {

    Route::get('/dashboard',[TeacherDashboardController::class,'index'])->name('dashboard');

    Route::get('/user_detail/{id}/{year?}/{month?}',[TeacherDashboardController::class,'user_detail'])->name('user_detail');
    Route::get('/user_update_get/{id}',[TeacherDashboardController::class,'user_update_get'])->name('user_update_get');
    Route::post('/user_update/{id}',[TeacherDashboardController::class,'user_update'])->name('user_update');
    Route::post('/user_delete/{id}',[TeacherDashboardController::class,'user_delete'])->name('user_delete');

    Route::post('/attentance/add/{id}',[TeacherAttendanceController::class,'add'])->name('attendance.add');
    Route::post('/attendance/delete/{id}',[TeacherAttendanceController::class,'delete'])->name('attendance.delete');
    Route::post('/attendance/update/{id}',[TeacherAttendanceController::class,'update'])->name('attendance.update');

    Route::get('/blog',[BlogController::class,'index'])->name('blog');
    Route::post('/blog/add',[BlogController::class,'add'])->name('blog.add');
    Route::post('/blog/delete/{id}',[BlogController::class,'delete'])->name('blog.delete');
    Route::get('/blog/detail/{id}',[BlogController::class,'teacher_detail'])->name('blog.detail');
    Route::post('/blog/update/{id}',[BlogController::class,'update'])->name('blog.update');

    Route::get('/photo',[PhotoController::class,'index'])->name('photo');
    Route::post('/photo/add',[PhotoController::class,'add'])->name('photo.add');
    Route::post('/photo/delete/{id}',[PhotoController::class,'delete'])->name('photo.delete');

    Route::post('/event/add/{id}',[EventController::class,'add'])->name('event.add');
    Route::post('/event/delete/{id}',[EventController::class,'delete'])->name('event.delete');
    Route::get('/event/create_get',[EventController::class,'create_get'])->name('event.create_get');
    Route::post('/event/create',[EventController::class,'create'])->name('event.create');
    Route::post('/event/create_update/{id}',[EventController::class,'update'])->name('event.update');
    Route::post('/event/create_delete/{id}',[EventController::class,'create_delete'])->name('event.create_delete');
    Route::get('/event/{year?}/{month?}', [EventController::class,'get'])->name('event');
    
    Route::get('/mail',[MailController::class,'index']);
    Route::post('/mail/confirm', [MailController::class,'confirm'])->name('mail.confirm');
    Route::post('/mail/send', [MailController::class,'send']);

    });
    
    require __DIR__.'/teacher.php';
});

