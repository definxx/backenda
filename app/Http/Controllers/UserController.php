<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Method to show the logout view
    public function showLogoutView()
    {
        return view('auth.logout');
    }

    // Method to handle the logout process
    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Auth::logout();

        return redirect('/login'); // Redirect to login page or any other page
    }
}
