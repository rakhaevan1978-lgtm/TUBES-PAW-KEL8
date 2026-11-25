<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Halaman Utama Publik (Hero + Portofolio + About Us + Testimoni)
Route::get('/', fn () => view('home'))->name('home');

// Halaman Publik Klien (Tanpa Login) — Wadah Peran 2 (Raditya) & Peran 5 (Toha)
Route::get('/order', fn () => view('public.order'))->name('public.order');
Route::get('/track', fn () => view('public.track'))->name('public.track');

// Autentikasi (Peran 1 - Evan: KF-01)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Area Khusus Owner (KF-02)
Route::middleware(['auth', 'role:owner'])->group(function () {
    // Peran 6 (Farrel): Dashboard & Laporan Bulanan
    Route::get('/owner/dashboard', fn () => view('dashboard.owner'))->name('dashboard.owner');
    Route::get('/owner/laporan', fn () => view('reports.index'))->name('reports.index');

    // Peran 2 (Raditya): Data Master & Order
    Route::get('/owner/orders', fn () => view('orders.index'))->name('orders.index');

    // Peran 3 (Rasya): Status, Tahap & Penugasan
    Route::get('/owner/penugasan', fn () => view('assignments.index'))->name('assignments.index');

    // Peran 4 (Mangaraja): Pembayaran & Perhitungan
    Route::get('/owner/pembayaran', fn () => view('payments.index'))->name('payments.index');

    // Peran 5 (Toha): Revisi Klien (Wadah Owner)
    Route::get('/owner/revisi', fn () => view('revisions.owner'))->name('owner.revisions');

    // Peran 1 (Evan): CRUD Pengguna & Desainer
    Route::resource('users', UserController::class)->except(['show']);
    Route::patch('/users/{user}/toggle-status', [UserController::class, 'toggleStatus'])
        ->name('users.toggle-status');
});

// Area Khusus Desainer (KF-02)
Route::middleware(['auth', 'role:desainer'])->group(function () {
    // Peran 6 (Farrel): Dashboard Desainer (Wadah)
    Route::get('/desainer/dashboard', fn () => view('dashboard.desainer'))->name('dashboard.desainer');

    // Peran 3 (Rasya): Tugas Saya (Wadah)
    Route::get('/desainer/tugas', fn () => view('desainer.tasks'))->name('desainer.tasks');

    // Peran 5 (Toha): Revisi Klien (Wadah)
    Route::get('/desainer/revisi', fn () => view('desainer.revisions'))->name('desainer.revisions');
});
