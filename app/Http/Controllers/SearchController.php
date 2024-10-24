<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sharespace;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Validate the input
        $request->validate([
            'query' => 'required|string|max:255',
        ]);

        // Search sharespaces based on the query
        $sharespaces = Sharespace::where('sharespace_user_title', 'LIKE', "%$query%")
            ->orWhere('sharespace_user_price', 'LIKE', "%$query%")
            ->orWhere('sharespace_user_address', 'LIKE', "%$query%")
            ->orWhere('sharespace_user_location', 'LIKE', "%$query%")
            ->get();

        // Return the search results to a view
        return view('search.results', compact('sharespaces', 'query'));
    }
}
