<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

final class ValidateImageDimensions
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
        if ($request->width > 2000 || $request->height > 2000) {
            abort(422, 'Height and width cannot exceed 2000 pixels');
        }
        return $next($request);
    }
}
