<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotCompany
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $guard = 'company')
    {
        if (!Auth::guard($guard)->check()) {
            return redirect()->back()
                ->with(['message' => 'Need Permissions', 'alert-type' => 'warning']);
        }
        return $next($request);
    }

}
