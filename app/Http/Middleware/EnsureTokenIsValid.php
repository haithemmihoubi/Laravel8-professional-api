<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureTokenIsValid
{

    public function handle(Request $request, Closure $next)
    {
        if ($request->input('token') !== 'haithem') {
            return redirect('post');
        }
        return $next($request);
    }
}
