<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

final class CacheImages
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
        $key = sprintf("%d.%d", $request->width, $request->height);
        return Cache::rememberForever($key, function () use ($next, $request) {
            return $next($request);
        });
    }
}
