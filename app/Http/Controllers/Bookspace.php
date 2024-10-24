<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Bookspace extends Controller
{
       // Handle the booking form submission
    
       public function bookApartment(Request $request)
{
    $user = Auth::user(); 

    if (!$user) {
        return redirect()->back()->with('error', 'You must be logged in to book an apartment.');
    }

    if ($user->accounttype !== 'student') {
        return redirect()->back()->with('error', 'Only students are allowed to book an apartment.');
    }

    $request->validate([
        'check_in' => 'required|date|after_or_equal:today',
        'check_out' => 'required|date|after_or_equal:check_in',
        'number_of_guests' => 'required|integer|min:1',
        'special_requests' => 'nullable|string|max:1000',
        'sharespace_id' => 'required|integer',
    ]);

    $booking = new Booking();
    $booking->sharespace_id = $request->sharespace_id;
    $booking->check_in = $request->check_in;
    $booking->check_out = $request->check_out;
    $booking->number_of_guests = $request->number_of_guests;
    $booking->special_requests = $request->special_requests;
    $booking->booker_id = Auth::id();
    $booking->save();

    return redirect()
        ->route('booked')
        ->with('success', 'Your booking has been confirmed!');
}


        // booking method in your controller
        public function booked()
        {
            $bookings = Booking::with(['shareSpace.images'])
                ->where('booker_id', Auth::user()->id)
                ->get();
        
            return view('user.mybook', compact('bookings'));
        }
        

}
