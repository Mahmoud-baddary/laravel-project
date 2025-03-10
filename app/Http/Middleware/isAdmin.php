<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isAdmin
{
       public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if($user->isAdmin()){
            return $next($request);
        }
        abort(403, "Unauthorized");
    }
}
