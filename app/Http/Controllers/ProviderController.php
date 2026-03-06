<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\SubService;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class ProviderController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        if (!$user->is_approved) {
            return view('provider.not_approved');
        }

        $mySubServiceIds = $user->subServices->pluck('id')->toArray();

        $pendingBookings = Booking::with('subService', 'customer')
            ->whereIn('sub_service_id', $mySubServiceIds)
            ->where('status', 'pending')
            ->get();

        $myJobs = Booking::with('subService', 'customer')
            ->where('provider_id', $user->id)
            ->whereIn('status', ['accepted', 'completed'])
            ->latest()
            ->get();

        return view('provider.dashboard', compact('pendingBookings', 'myJobs'));
    }

    public function manageServices()
    {
        $categories = Category::with('subServices')->get();
        $mySubServiceIds = Auth::user()->subServices->pluck('id')->toArray();
        return view('provider.services', compact('categories', 'mySubServiceIds'));
    }

    public function updateServices(Request $request)
    {
        $request->validate([
            'sub_services' => 'array',
            'sub_services.*' => 'exists:sub_services,id',
        ]);

        Auth::user()->subServices()->sync($request->sub_services ?? []);

        return redirect()->route('provider.dashboard')->with('success', 'Services updated successfully!');
    }

    public function updateBookingStatus(Booking $booking, Request $request)
    {
        $request->validate([
            'status' => 'required|in:accepted,rejected,completed',
        ]);

        if ($request->status === 'accepted') {
            $booking->update([
                'status' => 'accepted',
                'provider_id' => Auth::id(),
            ]);
        } else {
            $booking->update(['status' => $request->status]);
        }

        return redirect()->back()->with('success', 'Booking status updated!');
    }

    public function history()
    {
        $jobs = Booking::with('subService', 'customer')
            ->where('provider_id', Auth::id())
            ->where('status', 'completed')
            ->latest()
            ->get();
        return view('provider.history', compact('jobs'));
    }
}
