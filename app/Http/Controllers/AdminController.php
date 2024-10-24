<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking; // Assuming you have a Booking model

class AdminController extends Controller
{
    public function showDashboard()
    {
        // Retrieve the total number of users
        $totalUsers = User::count();
        
        // Retrieve other necessary data
        $totalHosts = User::where('accounttype', 'host')->count();
        $totalStudents = User::where('accounttype', 'student')->count();
        $totalBookings = Booking::count(); // Retrieve total number of bookings

        // Pass data to the view
        return view('admin.dashboard', compact('totalUsers', 'totalHosts', 'totalStudents', 'totalBookings'));
    }

    public function viewUsers()
    {
        // Fetch all users
        $users = User::all();

        return view('admin.users', compact('users'));
    }

    public function viewHosts()
    {
        // Fetch all hosts
        $hosts = User::where('accounttype', 'host')->get();

        return view('admin.hosts', compact('hosts'));
    }

    public function viewStudents()
    {
        // Fetch all students
        $students = User::where('accounttype', 'student')->get();

        return view('admin.students', compact('students'));
    }
}
