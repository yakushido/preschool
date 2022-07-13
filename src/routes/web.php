<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

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

Route::get('/',[HomeController::class,'show']);

// blog
Route::get('/admin/blog',[BlogController::class,'show'])->name('admin.blog');
Route::post('/admin/blog/add',[BlogController::class,'add'])->name('admin.blog.add');
Route::post('/admin/blog/update/{id}',[BlogController::class,'update'])->name('admin.blog.update');
Route::get('/blog/{id}',[BlogController::class,'single_page_show']);

// 欠席
Route::get('/attendance',[AttendanceController::class,'show']);

// ユーザー
Route::get('/login',[LoginController::class,'login_show'])->name('login.show');

Route::post('/login', [LoginController::class, 'login'])->name('login');
// 管理
Route::get('/admin/login', [AdminLoginController::class,'login_show'])->name('admin.login.show');
Route::post('/admin/login', [AdminloginController::class,'login'])->name('admin.login');

// 要認証(User)
Route::group(['middleware' => 'auth:user'], function () {
  Route::get('user', [UserController::class,'user_show'])->name('user.show');
  Route::get('/user/attendance', [AttendanceController::class,'user_show'])->name('user.attendance');
  Route::post('/user/attendance/add', [AttendanceController::class,'user_add'])->name('user.attendance.add');
  Route::get('/user/attendance/done', [AttendanceController::class,'user_done'])->name('user.attendance.done');
});

// 要認証(Admin)
Route::group(['middleware'=>'auth:admin'],function () {
  Route::get('/admin', [AdminController::class,'show'])->name('admin.show');
  Route::post('admin/add', [AdminController::class,'add'])->name('admin.add');
  Route::post('/admin/delete', [AdminController::class,'delete'])->name('admin.delete');
  Route::get('/admin/update/{id}', [AdminController::class,'update_show']);
  Route::post('/admin/update/{id}', [AdminController::class,'update'])->name('admin.update');
});

// 要認証(Teacher)
Route::group(['middleware'=>'auth:teachers'],function () {
  Route::get('teacher', [TeacherController::class,'show'])->name('teacher.show');
  Route::get('/admin/user/detail/{id}', [UserController::class, 'admin_user_detail_show']);
  Route::post('/attendance/add', [AttendanceController::class,'add'])->name('attendance.add');
  Route::post('/attendance/delete/{id}', [AttendanceController::class,'delete'])->name('attendance.delete');
  Route::post('/attendance/update/{id}', [AttendanceController::class,'update'])->name('attendance.update');
  Route::post('/teacher/search',[TeacherController::class,'search'])->name('teacher.search');
});

// メール確認の通知
Route::get('/email/verify', function () {
  return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// メール確認のハンドラ
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
  $request->fulfill();

  return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

// メール確認の再送信
use Illuminate\Http\Request;

Route::post('/email/verification-notification', function (Request $request) {
  $request->user()->sendEmailVerificationNotification();

  return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');