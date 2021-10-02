<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class validation_create_product
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
            "image0" => "required",
            "image1" => "required",
            "image2" => "required",
            "image3" => "required"
         ]);
        return $next($request);
    }
}
