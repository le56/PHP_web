<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class validation_product
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $validated = $request->validate([
            "title" => "required",
            "image" => "required",
            "content" => "required",
            "rate" => "required",
            "price" => "required",
            "category" => "required"
        ]);
        return $next($request);
    }
}
