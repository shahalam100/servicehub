<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Category;
use App\Models\SubService;
use App\Models\Booking;

class AdminController extends Controller
{
    public function dashboard()
    {
        $pendingProviders = User::where('role', 'provider')->where('is_approved', false)->count();
        $totalBookings = Booking::count();
        $totalCategories = Category::count();
        $totalSubServices = SubService::count();

        return view('admin.dashboard', compact('pendingProviders', 'totalBookings', 'totalCategories', 'totalSubServices'));
    }

    public function manageProviders()
    {
        $providers = User::where('role', 'provider')->get();
        return view('admin.providers', compact('providers'));
    }

    public function approveProvider(User $user)
    {
        $user->update(['is_approved' => true]);
        return redirect()->back()->with('success', 'Provider approved successfully!');
    }

    public function viewAllBookings()
    {
        $bookings = Booking::with('customer', 'provider', 'subService.category')->latest()->get();
        return view('admin.bookings', compact('bookings'));
    }

    // Category management can be added here or in a separate controller
}
