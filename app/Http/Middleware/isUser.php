<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isUser
{

    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if($user->isUser()|| $user->isSeller()|| $user->isAdmin()){
            return $next($request);
        }
        abort(403, "Unauthorized");
    }
}
