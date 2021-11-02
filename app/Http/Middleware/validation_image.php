<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class validation_image
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
        $request->validate([
            "image" => "required|image"
        ]);
        return $next($request);
    }
}
