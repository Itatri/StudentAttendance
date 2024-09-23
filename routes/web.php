<?php

use App\Http\Controllers\HocsinhModelController;
use App\Http\Controllers\GiaovienController;
use App\Http\Controllers\LichhocController;
use App\Http\Controllers\AdminController;
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

// Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/hocsinh', [AdminController::class, 'hocsinh']);
    Route::post('/admin/hocsinh/create', [AdminController::class, 'store_hocsinh']);
    Route::get('/admin/hocsinh/create', [AdminController::class, 'create_hocsinh']);
    Route::put('/admin/hocsinh/update/{id}', [AdminController::class, 'update_hocsinh']);
    Route::get('/admin/hocsinh/edit/{id}', [AdminController::class, 'edit_hocsinh']);
    Route::delete('/admin/hocsinh/destroy/{id}', [AdminController::class, 'destroy_hocsinh']);
    Route::get('/admin/hocsinh/attendance/{student}', [AdminController::class, 'showAttendanceDetails'])->name('admin.attendance');


    Route::get('/admin/giaovien', [AdminController::class, 'giaovien']);
    Route::post('/admin/giaovien/create', [AdminController::class, 'store_giaovien']);
    Route::get('/admin/giaovien/create', [AdminController::class, 'create_giaovien']);
    Route::put('/admin/giaovien/update/{id}', [AdminController::class, 'update_giaovien']);
    Route::get('/admin/giaovien/edit/{id}', [AdminController::class, 'edit_giaovien']);
    Route::delete('/admin/giaovien/destroy/{id}', [AdminController::class, 'destroy_giaovien']);

    Route::get('/admin/taikhoan', [AdminController::class, 'taikhoan']);
    Route::get('/admin/taikhoan/create', [AdminController::class, 'store_taikhoan']);
    Route::get('/admin/taikhoan/create', [AdminController::class, 'create_taikhoan']);
    Route::get('/admin/taikhoan/edit/{id}', [AdminController::class, 'edit_taikhoan']);
    Route::put('/admin/taikhoan/update/{id}', [AdminController::class, 'update_taikhoan']);
    Route::delete('/admin/taikhoan/destroy/{id}', [AdminController::class, 'destroy_taikhoan']);
});

// Routes accessible by either teacher or student
// Route::middleware(['auth', 'teacherOrStudent'])->group(function () {
//     Route::get('/', [HocsinhModelController::class, 'index']);
// });

// Student routes
Route::middleware(['auth', 'student'])->group(function () {
    
    Route::get('/hocsinh', [HocsinhModelController::class, 'index_hocsinh']);
    Route::get('/hocsinh/lichhoc', [LichhocController::class, 'lichhoc_hocsinh'])->name('student.schedule');
    Route::get('/hocsinh/lichhoc/{session_id}', [LichhocController::class, 'showSessionDetails'])->name('student.session.details');
    Route::get('/', [HocsinhModelController::class, 'index_hocsinh']);
});

// Teacher routes
Route::middleware(['auth', 'teacher'])->group(function () {
    Route::get('/giaovien/lichday', [LichhocController::class, 'lichday_giaovien'])->name('teacher.schedule');
    Route::get('/giaovien', [GiaovienController::class, 'index_giaovien'])->name('teacher.dashboard');
    Route::get('/giaovien/lichday/{date}', [LichhocController::class, 'chitiet_lichday'])->name('teacher.schedule.date');
    Route::get('/giaovien/lichday/{date}/{session_id}', [LichhocController::class, 'diemdanhhocsinh'])->name('teacher.attendance');
    Route::post('/giaovien/lichday/{session_id}/save', [LichhocController::class, 'saveAttendance'])->name('teacher.attendance.save');


});

// Middleware to redirect based on role after login
Route::get('/redirect-based-on-role', function() {
    // This route will be handled by the RedirectBasedOnRole middleware
})->middleware('auth', 'redirectBasedOnRole');

// Authentication routes
Auth::routes();
