<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isSeller
{

    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if($user->isSeller()|| $user->isAdmin()){
            return $next($request);
        }
        return redirect()->route('home')->with('status', 'login with a seller acount to reach this page');
    }
}
