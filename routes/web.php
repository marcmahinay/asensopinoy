<?php

use App\Http\Controllers\AyudaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    /* return view('welcome'); */
    return redirect()->route('dashboard');
});

Route::get('/member/{member}', [MemberController::class, 'show'])->name('member.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/member/create', [MemberController::class, 'create'])->name('member.create');
    Route::get('/member', [MemberController::class, 'index'])->name('member.index');
    Route::post('/member', [MemberController::class, 'store'])->name('member.store');
    Route::patch('/member', [MemberController::class, 'update'])->name('member.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/ayuda/create', [AyudaController::class, 'create'])->name('ayuda.create');
    Route::get('/ayuda', [AyudaController::class, 'index'])->name('ayuda.index');
    Route::post('/ayuda', [AyudaController::class, 'store'])->name('ayuda.store');
    Route::patch('/ayuda', [AyudaController::class, 'update'])->name('ayuda.update');
});





require __DIR__.'/auth.php';
