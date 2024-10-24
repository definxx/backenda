<?php
namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index($receiver_id)
    {
        $messages = Message::where(function ($query) use ($receiver_id) {
                $query->where('sender_id', Auth::id())
                      ->where('receiver_id', $receiver_id);
            })
            ->orWhere(function ($query) use ($receiver_id) {
                $query->where('sender_id', $receiver_id)
                      ->where('receiver_id', Auth::id());
            })
            ->orderBy('created_at', 'asc')
            ->get();

        return view('messages.index', compact('messages', 'receiver_id'));
    }

    public function store(Request $request, $receiver_id)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $receiver_id,
            'message' => $request->message,
        ]);

        return redirect()->route('messages.index', $receiver_id);
    }

    public function sendMessage(Request $request, $host_id)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        Message::create([
            'user_id' => Auth::id(), // Current logged-in user
            'host_id' => $host_id,
            'message' => $request->message,
        ]);

        return back()->with('success', 'Message sent successfully!');
    }
  

public function inbox()
{
    // Fetch unique host IDs that the student has messaged
    $hostIds = Message::where('user_id', Auth::id())->distinct()->pluck('host_id');

    // Fetch the host details
    $hosts = User::whereIn('id', $hostIds)->get();

    return view('user.inbox', compact('hosts'));
}


public function viewChat($host_id)
{
    // Fetch messages between the logged-in user and the selected host
    $messages = Message::where(function ($query) use ($host_id) {
        $query->where('user_id', Auth::id())
              ->where('host_id', $host_id);
    })->orWhere(function ($query) use ($host_id) {
        $query->where('user_id', $host_id)
              ->where('host_id', Auth::id());
    })->get();

    return view('user.chat', compact('messages', 'host_id'));
}


public function hostInbox()
{
    // Fetch unique student IDs that the host has messaged
    $studentIds = Message::where('host_id', Auth::id())->distinct()->pluck('user_id');

    // Fetch the student details
    $students = User::whereIn('id', $studentIds)->get();

    return view('host.inbox', compact('students'));
}

public function viewHostChat($user_id)
{
    // Fetch messages between the logged-in host and the selected student
    $messages = Message::where(function ($query) use ($user_id) {
        $query->where('host_id', Auth::id())
              ->where('user_id', $user_id);
    })->orWhere(function ($query) use ($user_id) {
        $query->where('host_id', $user_id)
              ->where('user_id', Auth::id());
    })->get();

    return view('host.chat', compact('messages', 'user_id'));
}



}
