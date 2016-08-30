<?php

namespace Modules\Permission\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role, $permission = null)
    {
        if (Auth::guest()) {
            return redirect($urlOfYourLoginPage);
        }

        if (! $request->user()->hasRole($role)) {
            abort(403);
        }

        if ($permission !== null  && ! $request->user()->can($permission)) {
            abort(403);
        }

        return $next($request);
    }
}
