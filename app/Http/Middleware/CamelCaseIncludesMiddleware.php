<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CamelCaseIncludesMiddleware
{
    /**
 * Handle an incoming request.
 *
 * @param Request $request
 * @param  \Closure(Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
 * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
 */
    public function handle(Request $request, Closure $next)
    {
        if ($request->has('include')) {
            $includes = Str::camel($request->get('include'));
            $request->attributes->set('include', $includes);
        }

        return $next($request);
    }
}
