<?php

namespace App\Http\Middleware;

<<<<<<< HEAD
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
=======
use Closure;
>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
<<<<<<< HEAD
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);
            }
=======
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb
        }

        return $next($request);
    }
}
