<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ServiceShowController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ExportController;





use App\Http\Controllers\SpecialistController;

Route::get('/', [SpecialistController::class, 'index'])->name('home');

Route::get('/services', [ServiceShowController::class, 'index'])->name('showservice');
Route::get('/services/{service}', [ServiceShowController::class, 'show'])->name('services.show');
Route::get('/all-specialists', [SpecialistController::class, 'all'])->name('all.specialists');

Route::middleware('guest')->group(function () {

    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});







Route::middleware('auth')->group(function () {
    Route::post('/services/{service}/appointments', [AppointmentController::class, 'create'])->name('appointments.create');
    Route::get('/services/{service}/appointments', [AppointmentController::class, 'show'])->name('appointments.show');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/staff', [StaffController::class, 'index'])->name('admin.staff.index');
    Route::get('/admin/service', [ServiceController::class, 'index'])->name('admin.services.index');


    Route::get('/admin/service/create', [ServiceController::class, 'create'])->name('admin.services.create');
    Route::post('/admin/service', [ServiceController::class, 'store'])->name('admin.services.store');
    Route::get('/admin/service/{service}/edit', [ServiceController::class, 'edit'])->name('admin.services.edit');
    Route::put('/admin/service/{service}', [ServiceController::class, 'update'])->name('admin.services.update');
    Route::delete('/admin/service/{service}', [ServiceController::class, 'destroy'])->name('admin.services.destroy');


    Route::get('/admin/staff/create', [StaffController::class, 'create'])->name('admin.staff.create');
    Route::post('/admin/staff', [StaffController::class, 'store'])->name('admin.staff.store');
    Route::get('/admin/staff/{staff}/edit', [StaffController::class, 'edit'])->name('admin.staff.edit');
    Route::put('/admin/staff/{staff}', [StaffController::class, 'update'])->name('admin.staff.update');
    Route::delete('/admin/staff/{staff}', [StaffController::class, 'destroy'])->name('admin.staff.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/export/active-appointments', [ExportController::class, 'exportActiveAppointments'])->name('export.active-appointments');
    Route::get('/export/completed-appointments', [ExportController::class, 'exportCompletedAppointments'])->name('export.completed-appointments');
});