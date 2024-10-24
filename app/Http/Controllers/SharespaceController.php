<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sharespace;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
class SharespaceController extends Controller
{
    public function sharespace()
    {
        $profile = Auth::user()->profile;
        if ($profile && $profile->id) {
            return view('host.sharespace');
        } else {
            return view('host.complete');
        }
    }
    
    public function postsharespace(Request $request)
    {
        // Check if the user has already posted 2 times today
        $today = now()->startOfDay();
        $postCount = Sharespace::where('sharespace_user_id', Auth::id())
                              ->where('created_at', '>=', $today)
                              ->count();
    
        if ($postCount >= 2) {
            return redirect()
                ->back()
                ->withErrors(['limit' => 'You can only post 2 times a day. Please try again tomorrow.']);
        }
    
        // Validate the incoming request data
        $validatedData = $request->validate([
            'sharespace_user_title' => 'required|string|max:255',
            'sharespace_user_price' => 'required|string|max:255',
            'sharespace_user_address' => 'required|string|max:255',
            'sharespace_user_location' => 'required|string|max:255',
            'sharespace_user_description' => 'required|string',
            'sharespace_user_images.*' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
        ]);
    
        // Create a new Sharespace entry
        $sharespace = new Sharespace();
        $sharespace->sharespace_user_id = Auth::id();
        $sharespace->sharespace_user_title = $request->sharespace_user_title;
        $sharespace->sharespace_user_price = $request->sharespace_user_price;
        $sharespace->sharespace_user_address = $request->sharespace_user_address;
        $sharespace->sharespace_user_location = $request->sharespace_user_location;
        $sharespace->sharespace_user_description = $request->sharespace_user_description;
        $sharespace->save();
    
        // Handle file uploads and save to Image model
        if ($request->hasFile('sharespace_user_images')) {
            foreach ($request->file('sharespace_user_images') as $image) {
                if ($image->getSize() > 4096 * 1024) { // Check if image size exceeds 4MB
                    return redirect()
                        ->back()
                        ->withErrors(['sharespace_user_images' => 'One or more images are too large. Please upload images smaller than 4MB.'])
                        ->withInput();
                }
    
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/sharespaces'), $imageName);
    
                $imageModel = new Image();
                $imageModel->sharespace_id = $sharespace->id; // Corrected to use the newly created Sharespace ID
                $imageModel->path = 'uploads/sharespaces/' . $imageName;
                $imageModel->save();
            }
        }
    
        // Redirect back with success message
        return redirect()
            ->back()
            ->with('success', 'Share space post created successfully!');
    }
    
      
    public function myspace()
    {
        $sharespaces = Sharespace::where('sharespace_user_id', Auth::id())
        ->with('images')
        ->get();
    
    
        return view('host.myspace', compact('sharespaces'));
    }
    

    public function edit($id)
{
    $sharespace = ShareSpace::findOrFail($id);
    return view('sharespaces.edit', compact('sharespace'));
}

public function update(Request $request, $id)
{
    $sharespace = ShareSpace::findOrFail($id);

    // Validate incoming request data
    $request->validate([
        'sharespace_user_title' => 'required|string|max:255',
        'sharespace_user_location' => 'required|string|max:255',
        'sharespace_user_address' => 'required|string|max:255',
        'sharespace_user_description' => 'required|string',
        // Add any other validation rules for fields
    ]);

    // Update the sharespace details
    $sharespace->update($request->all());

    return redirect()->route('sharespaces.index')->with('success', 'ShareSpace updated successfully.');
}

public function deletemyspace($id)
{
    $sharespace = ShareSpace::findOrFail($id);
    $sharespace->delete();
    return redirect()->route('myspace')->with('success', 'ShareSpace deleted successfully.');
}
public function viewspace($id)
{
    if (!$id) {
        return redirect()
            ->back()
            ->with('error', 'Share space not found.');
    }

    $viewspace = Sharespace::with('images')->find($id);

    if (!$viewspace) {
        return redirect()
            ->back()
            ->with('error', 'Share space not found.');
    }

    return view('viewspace', compact('viewspace'));
}



}
