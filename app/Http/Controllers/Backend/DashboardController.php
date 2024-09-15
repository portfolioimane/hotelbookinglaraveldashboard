<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display the dashboard view.
     */
    public function index()
    {
        // Get the booking data grouped by month
        $bookings = Booking::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', now()->year) // Optional: Filter for the current year
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month'); // This will return an associative array ['month' => 'count']

        // Prepare the labels and data for the chart
        $months = [];
        $data = [];

        for ($i = 1; $i <= 12; $i++) {
            $months[] = Carbon::create()->month($i)->format('F'); // e.g., January, February
            $data[] = $bookings->get($i, 0); // Get count or default to 0 if no data
        }

        return view('backend.dashboard.index', compact('months', 'data'));
    }
}
