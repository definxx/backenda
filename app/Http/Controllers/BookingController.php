<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class BookingController extends Controller
{
    public function cancelBooking($id)
    {
        $booking = Booking::where('id', $id)->where('booker_id', Auth::id())->firstOrFail();
    
        if ($booking->status === 'confirmed') {
            return redirect()
                ->back()
                ->withErrors(['error' => 'You cannot cancel a confirmed booking.']);
        }
    
        $booking->status = 'canceled';
        $booking->save();
    
        return redirect()
            ->back()
            ->with('success', 'Booking canceled successfully.');
    }

    public function deleteBooking($id)
{
    // Retrieve the booking for the authenticated user
    $booking = Booking::where('id', $id)
                      ->where('booker_id', Auth::id())
                      ->firstOrFail();

    // Check if the booking is confirmed
    if ($booking->status === 'confirmed') {
        return redirect()
            ->back()
            ->withErrors(['error' => 'You cannot cancel a confirmed booking.']);
    }

    // Delete the booking if it is not confirmed
    $booking->delete();

    // Redirect back with a success message
    return redirect()
        ->back()
        ->with('success', 'Booking deleted successfully.');
}


public function updateStatus(Request $request, $id)
{
    $booking = Booking::findOrFail($id);
    $booking->status = $request->input('status');
    $booking->save();

    return redirect()->back()->with('status', 'Booking status updated successfully.');
}
    
}
