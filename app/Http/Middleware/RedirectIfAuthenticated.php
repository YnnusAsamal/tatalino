<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::guard($guard)->user();

                Log::info('User Roles:', $user->getRoleNames()->toArray());

                if (method_exists($user, 'hasRole') && method_exists($user, 'hasAnyRole')) {
                    $redirectRoute = match (true) {
                        $user->hasRole('Student') => 'studentposts.index',
                        $user->hasAnyRole(['Admin', 'Super-Admin', 'Publisher']) => 'dashboard',
                        default => 'dashboard',
                    };

                    return redirect()->route($redirectRoute);
                } else {
                    // If user model is missing the HasRoles trait, abort with 403
                    abort(403, 'User model is missing HasRoles trait.');
                }
            }
        }

        return $next($request);
    }
}
