<?php

use App\Http\Controllers\AyudaController;
use App\Http\Controllers\AyudaScheduleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MunicityController;
use App\Http\Controllers\BarangayController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    /* return view('welcome'); */
    return redirect()->route('member.index');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/member/search', [MemberController::class, 'search'])->name('member.search');
    Route::get('/member/create/{barangay}', [MemberController::class, 'create'])->name('member.create');
    Route::get('/member', [MemberController::class, 'index'])->name('member.index');
    Route::put('/member/{id}', [MemberController::class, 'update'])->name('member.update');
    Route::get('/member/{member}/edit', [MemberController::class, 'edit'])->name('member.edit');
    Route::get('/member/{asenso_id}', [MemberController::class, 'show'])->name('member.show');
    Route::post('/member', [MemberController::class, 'store'])->name('member.store');
    Route::post('/member/{member}/change-status', [MemberController::class, 'changeStatus'])->name('member.changeStatus');
});

Route::middleware('auth')->group(function () {
    Route::get('/ayuda/create', [AyudaController::class, 'create'])->name('ayuda.create');
    Route::get('/ayuda', [AyudaController::class, 'index'])->name('ayuda.index');
    Route::get('/ayuda/{ayuda}/edit', [AyudaController::class, 'edit'])->name('ayuda.edit');
    Route::post('/ayuda', [AyudaController::class, 'store'])->name('ayuda.store');
    Route::put('/ayuda/{ayuda}', [AyudaController::class, 'update'])->name('ayuda.update');
    Route::delete('/ayuda/{ayuda}', [AyudaController::class, 'destroy'])->name('ayuda.destroy');

    Route::get('/ayuda-schedule', [AyudaScheduleController::class, 'index'])->name('ayuda-schedule.index');

    Route::get('/municity/create', [MunicityController::class, 'create'])->name('municity.create');
    Route::get('/municity', [MunicityController::class, 'index'])->name('municity.index');
    Route::post('/municity', [MunicityController::class, 'store'])->name('municity.store');
    Route::get('/municity/{municity}/edit', [MunicityController::class, 'edit'])->name('municity.edit');
    Route::get('/municity/{municity}', [MunicityController::class, 'show'])->name('municity.show');
    Route::put('/municity/{municity}', [MunicityController::class, 'update'])->name('municity.update');


    Route::get('/barangay/create', [BarangayController::class, 'create'])->name('barangay.create');
    Route::get('/barangay', [BarangayController::class, 'index'])->name('barangay.index');
    Route::post('/barangay', [BarangayController::class, 'store'])->name('barangay.store');
    Route::get('/barangay/{barangay}/edit', [BarangayController::class, 'edit'])->name('barangay.edit');
    Route::get('/barangay/{barangay}', [BarangayController::class, 'show'])->name('barangay.show');
    Route::put('/barangay/{barangay}', [BarangayController::class, 'update'])->name('barangay.update');
});



require __DIR__.'/auth.php';
