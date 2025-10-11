<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
   public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if (!$user || !$user->is_approved || $user->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
