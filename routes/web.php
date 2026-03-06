<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubServiceController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

// Temporary route to fix PostgreSQL sequences after manual seeding
Route::get('/fix-database', function () {
    try {
        $tables = ['users', 'categories', 'sub_services', 'bookings', 'provider_sub_service'];
        foreach ($tables as $table) {
            $maxId = \DB::table($table)->max('id');
            if ($maxId) {
                // This resets the Postgres "Auto Increment" counter to the highest current ID
                \DB::statement("SELECT setval('{$table}_id_seq', $maxId)");
            }
        }
        return "Database sequences fixed successfully!";
    } catch (\Exception $e) {
        return "Error: " . $e->getMessage();
    }
});

Route::get('/dashboard', function () {
    $user = Auth::user();
    if ($user->isAdmin()) {
        return redirect()->route('admin.dashboard');
    } elseif ($user->isProvider()) {
        return redirect()->route('provider.dashboard');
    }
    return redirect()->route('customer.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Customer Routes
    Route::prefix('customer')->name('customer.')->group(function () {
        Route::get('/dashboard', [CustomerController::class, 'dashboard'])->name('dashboard');
        Route::get('/category/{category}', [CustomerController::class, 'showCategory'])->name('category');
        Route::post('/book', [CustomerController::class, 'storeBooking'])->name('book');
        Route::get('/bookings', [CustomerController::class, 'myBookings'])->name('bookings');
    });

    // Provider Routes
    Route::prefix('provider')->name('provider.')->group(function () {
        Route::get('/dashboard', [ProviderController::class, 'dashboard'])->name('dashboard');
        Route::get('/services', [ProviderController::class, 'manageServices'])->name('services');
        Route::post('/services', [ProviderController::class, 'updateServices'])->name('services.update');
        Route::post('/booking/{booking}/status', [ProviderController::class, 'updateBookingStatus'])->name('booking.status');
        Route::get('/history', [ProviderController::class, 'history'])->name('history');
    });

    // Admin Routes
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/providers', [AdminController::class, 'manageProviders'])->name('providers');
        Route::post('/provider/{user}/approve', [AdminController::class, 'approveProvider'])->name('provider.approve');
        Route::get('/bookings', [AdminController::class, 'viewAllBookings'])->name('bookings');

        // New Category and SubService Routes
        Route::resource('categories', CategoryController::class);
        Route::resource('sub-services', SubServiceController::class);
    });
});

require __DIR__.'/auth.php';
