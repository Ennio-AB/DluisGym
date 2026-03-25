<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\MembershipController as AdminMembership;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Client\DashboardController as ClientDashboard;
use App\Http\Controllers\Client\MembershipController as ClientMembership;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicMembershipController;
use Illuminate\Support\Facades\Route;

// --- Public ---
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/memberships', [PublicMembershipController::class, 'index'])->name('memberships');
Route::get('/location', [HomeController::class, 'location'])->name('location');

// --- Auth (Breeze) ---
require __DIR__.'/auth.php';

// --- Authenticated ---
Route::middleware('auth')->group(function () {

    // Profile (Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Redirect after login based on role
    Route::get('/dashboard', function () {
        return auth()->user()->isAdmin()
            ? redirect()->route('admin.dashboard')
            : redirect()->route('client.dashboard');
    })->name('dashboard');

    // Admin
    Route::middleware('admin')
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {
            Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');
            Route::resource('products', ProductController::class);
            Route::resource('sales', SaleController::class)->only(['index', 'create', 'store', 'show']);
            Route::resource('memberships', AdminMembership::class);
            Route::get('/reports', [ReportController::class, 'index'])->name('reports');
        });

    // Client
    Route::middleware('client')
        ->prefix('client')
        ->name('client.')
        ->group(function () {
            Route::get('/dashboard', [ClientDashboard::class, 'index'])->name('dashboard');
            Route::get('/memberships', [ClientMembership::class, 'index'])->name('memberships');
        });
});
