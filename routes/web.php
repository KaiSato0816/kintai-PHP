<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CsvDownloadController;
use App\Http\Controllers\TimeController;


Route::get('/edit/{id}', [TimeController::class, 'edit'])->name('time.edit');
Route::put('/update/{id}', [TimeController::class, 'update'])->name('update.time');
Route::get('/admin/csv-download/{id}', [CsvDownloadController::class, 'downloadCsv'])->name('downloadCsv');
Route::get('/admin_dashboard', [AdminController::class, 'index'])->name('Admin.index');
Route::get('/dashboard/recordAttendance', [AttendanceController::class, 'recordAttendance']);
Route::post('/dashboard/recordAttendance', [AttendanceController::class, 'recordAttendance'])->name('Attendance.recordAttendance');
Route::get('/record-leave', [AttendanceController::class, 'recordLeave']);
Route::put('/record-leave', [AttendanceController::class, 'recordLeave'])->name('Attendance.recordLeave');
Route::get('/report', [ReportController::class, 'create']);
Route::post('/report', [ReportController::class, 'store']);
Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
Route::get('/index', [UserController::class, 'index']);
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/dashboard', [ReportController::class, 'create'])->name('report.create');
});

require __DIR__.'/auth.php';
