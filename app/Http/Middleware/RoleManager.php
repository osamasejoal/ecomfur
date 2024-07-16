<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $userRole = Auth::user()->role;

        switch ($role) {
            case 'admin':
                if ($userRole == 'admin') {
                    return $next($request);
                }
                break;
            case 'moderator':
                if ($userRole == 'moderator') {
                    return $next($request);
                }
                break;
            case 'user':
                if ($userRole == 'user') {
                    return $next($request);
                }
                break;
        }

        if ($userRole == 'admin') {
            return redirect()->route('home.admin');
        }
        elseif ($userRole =='moderator') {
            return redirect()->route('home.moderator');
        }
        else {
            return redirect()->route('frontpage');
        }
    }
}
