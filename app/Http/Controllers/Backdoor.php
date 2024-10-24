<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Sharespace;

class Backdoor extends Controller
{
    public function access()
    {
        $user = Auth::user();

        if (!$user) {
            // If no user is authenticated, show public view
            $sharespaces = Sharespace::all();
            return view('welcome', compact('sharespaces'));
        }

        // Check if the user is the admin
        if ($user->email === "24finderjosh@gmail.com") {
            return redirect()->route('admin.dashboard');
        }

        // Determine the account type and check if the profile exists
        $account_type = $user->accounttype;
        $account_check = Profile::where('profile_user_id', $user->id)->exists();

        // Redirect unverified users to the email verification notice
        if (is_null($user->email_verified_at)) {
            return redirect()->route('verification.notice');
        }

        // Handle host accounts
        if ($account_type === "host") {
            $sharespaces = Sharespace::all();
            return $account_check 
                ? view('host.index', compact('sharespaces', 'account_type'))
                : view('host.complete');
        }

        // Handle student accounts
        if ($account_type === "student") {
            $sharespaces = Sharespace::all();
            return $account_check 
                ? view('user.index', compact('sharespaces', 'account_type'))
                : view('user.complete');
        }

        // Handle any other account types or default cases
        return redirect()->route('/'); // Use a named route or specific URL
    }
}
