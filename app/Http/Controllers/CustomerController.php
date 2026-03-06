<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\SubService;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function dashboard()
    {
        $categories = Category::all();
        return view('customer.dashboard', compact('categories'));
    }

    public function showCategory(Category $category)
    {
        $category->load('subServices');
        return view('customer.category', compact('category'));
    }

    public function storeBooking(Request $request)
    {
        $request->validate([
            'sub_service_id' => 'required|exists:sub_services,id',
            'address' => 'required|string|max:500',
            'booking_date' => 'required|date|after_or_equal:today',
            'booking_time' => 'required',
        ]);

        Booking::create([
            'customer_id' => Auth::id(),
            'sub_service_id' => $request->sub_service_id,
            'address' => $request->address,
            'booking_date' => $request->booking_date,
            'booking_time' => $request->booking_time,
            'status' => 'pending',
        ]);

        return redirect()->route('customer.bookings')->with('success', 'Booking submitted successfully!');
    }

    public function myBookings()
    {
        $bookings = Booking::with('subService.category', 'provider')
            ->where('customer_id', Auth::id())
            ->latest()
            ->get();
        return view('customer.bookings', compact('bookings'));
    }
}
