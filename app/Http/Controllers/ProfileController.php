<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function uploadprofile(Request $request)
{
    // Validate the request inputs
    $request->validate([
        'profile_user_country' => 'required|string|max:255',
        'profile_user_pic' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
        'profile_user_state' => 'required|string|max:255',
        'profile_user_address' => 'required|string|max:255',
        'profile_user_town' => 'required|string|max:255',
        'profile_user_postal_code' => 'required|string|max:10',
        'profile_user_date_of_birth' => ['required', 'date', function ($attribute, $value, $fail) {
            $dob = new \DateTime($value);
            $now = new \DateTime();
            $age = $now->diff($dob)->y;
            if ($age < 18) {
                $fail('You must be at least 18 years old.');
            }
        }],
        'profile_user_bio' => 'nullable|string',
    ]);
    
    $user = Auth::user();
    $profile = $user->profile ?: new Profile();
    
    // Update the profile fields
    $profile->profile_user_bio = $request->input('profile_user_bio', $profile->profile_user_bio);
    $profile->profile_user_state = $request->input('profile_user_state', $profile->profile_user_state);
    $profile->profile_user_address = $request->input('profile_user_address', $profile->profile_user_address);
    $profile->profile_user_town = $request->input('profile_user_town', $profile->profile_user_town);
    $profile->profile_user_postal_code = $request->input('profile_user_postal_code', $profile->profile_user_postal_code);
    $profile->profile_user_date_of_birth = $request->input('profile_user_date_of_birth', $profile->profile_user_date_of_birth);
    $profile->profile_user_country = $request->input('profile_user_country', $profile->profile_user_country);
    $profile->profile_user_id = $user->id; // Ensure the user ID is set

    // Handle the profile picture upload
    if ($request->hasFile('profile_user_pic')) {
        $image = $request->file('profile_user_pic');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('public/uploads/profilepic'), $imageName);
        $profile->profile_user_pic = 'public/uploads/profilepic/' . $imageName;
    }

    // Save the updated profile information to the database
    $profile->save();
    
    // Redirect back with a success message
    return redirect(url('/'))->with('success', ' successfully!');

}



public function showprofile()
{
    $user = auth()->user(); // Get the currently authenticated user

    if ($user->accounttype === 'host') {
        // Logic for host users
        return view('host.complete'); // Change to the view you want for hosts
    } elseif ($user->accounttype === 'student') {
        // Logic for student users
        return view('user.complete'); // Change to the view you want for students
    } else {
        // Optional: Handle other user types or unauthenticated access
        return redirect()->route('/')->with('error', 'Access denied.');
    }
}
    
}
