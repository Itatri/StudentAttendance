<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectBasedOnRole
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect('/admin');
            } elseif ($user->role === 'teacher') {
                return redirect('/giaovien');
            } elseif ($user->role === 'student') {
                return redirect('/hocsinh');
            }
        }
        
        return $next($request);
    }
}

