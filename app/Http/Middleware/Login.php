<?php

namespace App\Http\Middleware;

use Closure;

class Login
{

    public function handle($request, Closure $next)
    {
  
        if (!session()->get('user_id')) {
            return redirect()->route('login-masyarakat');
        }

        return $next($request);
    }
}
