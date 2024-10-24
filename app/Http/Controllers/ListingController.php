<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
class ListingController extends Controller
{
    public function listing()
{
    $user = Auth::user();

    // Fetch bookings where the current user is the owner of the sharespace
    $bookings = Booking::whereHas('sharespace', function ($query) use ($user) {
        $query->where('sharespace_user_id', $user->id);
    })->with(['user', 'sharespace'])->get();

    if ($bookings->isNotEmpty()) {
        return view('host.mylisting', compact('bookings'));
    } else {
        return redirect('/');
    }
}

    
}
