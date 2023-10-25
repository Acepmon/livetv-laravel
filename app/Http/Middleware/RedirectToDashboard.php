<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Enums\UserRole;

class RedirectToDashboard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! Auth::guest()) {
            if (Auth::user()->role == UserRole::ADMIN) {
                return redirect()->route('filament.admin.pages.dashboard');
            } else if (Auth::user()->role == UserRole::CREATOR) {
                return redirect()->route('filament.studio.pages.dashboard');
            } else {
                return redirect()->route('dashboard');
            }
        }

        return $next($request);
    }
}
