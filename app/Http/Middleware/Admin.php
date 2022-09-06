<?php

namespace App\Http\Middleware;

use App\Models\Roles;
use Closure;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if (!$user) {
            abort(Response::HTTP_UNAUTHORIZED, 'Unauthorized.');
        }

        if ($user->role_id != Roles::ADMIN) {
            abort(Response::HTTP_UNAUTHORIZED, 'Unauthorized.');
        }

        return $next($request);
    }
}
