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
         $request->validate([
            "title" => "required",
            "description" => "required",
            "content" => "required",
            "rate" => "required",
            "price" => "required",
            "category" => "required",
            "images"  => "required",
            "quantityRemain" => "required",
            "priceImport" => "required"
        ]);
        return $next($request);
    }
}
