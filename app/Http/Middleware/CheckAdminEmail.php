<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdminEmail
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the authenticated user's email matches the specified email
        if ($request->user() && $request->user()->email === '24finderjosh@gmail.com') {
            return $next($request);
        }

        // Redirect or abort if the email doesn't match
        return redirect('/')->with('error', 'Unauthorized access.');
    }
}
