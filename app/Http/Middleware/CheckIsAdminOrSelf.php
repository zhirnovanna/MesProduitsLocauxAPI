<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
class CheckIsAdminOrSelf
{
    public function handle($request, Closure $next)
    {
        $requestedUserAdmin = $request->route()->parameter('admin');
        if(
            Auth::user()->role === 1 ||
            Auth::user()->admin == $requestedUserAdmin
        ) {
            return $next($request);
        }
        else {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
    }
}
