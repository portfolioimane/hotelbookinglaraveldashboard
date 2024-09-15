<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('frontend.rooms.index', compact('rooms'));
    }

    public function show($id)
    {
        $room = Room::findOrFail($id);
        return view('frontend.rooms.show', compact('room'));
    }


    public function getAvailability($roomId)
    {
        // Log the room ID being processed
        Log::debug('Processing availability for room ID: ' . $roomId);

        // Retrieve the room (check if it exists)
        $room = Room::find($roomId);
        if (!$room) {
            Log::error('Room not found for ID: ' . $roomId);
            return response()->json(['error' => 'Room not found'], 404);
        }

        // Fetch bookings for the room with status confirmed or pending
        $bookings = Booking::where('room_id', $roomId)
            ->where(function($query) {
                $query->where('status', 'confirmed')
                      ->orWhere('status', 'pending');
            })
            ->get();

        // Log the number of bookings found
        Log::debug('Bookings found: ' . $bookings->count());

        $unavailableDates = [];
        foreach ($bookings as $booking) {
            $start = Carbon::parse($booking->check_in);
            $end = Carbon::parse($booking->check_out);

            // Log each booking's date range
            Log::debug('Booking from ' . $start->toDateString() . ' to ' . $end->toDateString());

            while ($start->lte($end)) {
                $unavailableDates[] = $start->format('Y-m-d');
                $start->addDay();
            }
        }

        // Log the unavailable dates
        Log::debug('Unavailable dates: ' . implode(', ', $unavailableDates));

        return response()->json(['unavailableDates' => $unavailableDates]);
    }




}



