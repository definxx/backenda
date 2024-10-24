<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Preference;
class PreferenceController extends Controller
{
    public function PreferenceController(){
        return  view('user.preference');
    }
}
