<?php

namespace app\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\VarDumper\Caster\RedisCaster;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //jiks kondisinya yng login user maka mengarahkan/redirect ke dashboard
        //sebaliknya jika yg login bukan user (admin) maka mengarahkan 
        if ($request->user()) {
            return redirect('/dashboard');
        }
        return $next($request);
    }
}
