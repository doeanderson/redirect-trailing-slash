<?php

namespace DoeAnderson\RedirectTrailingSlash\Http\Middleware;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RedirectTrailingSlash
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->getPathInfo() === '/') {
            return $next($request);
        }

        if (Str::endsWith($request->getUri(), '/')) {
            return redirect(Str::replaceLast('/', '', $request->getUri()), 301);
        }

        return $next($request);
    }
}
