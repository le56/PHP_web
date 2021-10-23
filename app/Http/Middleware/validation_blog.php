<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class validation_blog
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
            "title" => "required",
            "shortContent" => "required",
            "content" => "required",
            "category" => "required",
        ]);
        return $next($request);
    }
}
