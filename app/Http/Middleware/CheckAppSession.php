<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class CheckAppSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $loggedUser = User::find($request->userId);
        error_log('loggedUser: ' . $loggedUser->token);
        error_log('token received: ' . $request->token);
        if ($loggedUser->token != $request->token) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        return $next($request);
    }
}
