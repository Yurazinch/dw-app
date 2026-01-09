<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FilmListOpen
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $sales = Cache::get('sales');
        if ($sales === null || $sales === false) {
            return redirect('/close');
        } elseif ($sales === true) {
            return $next($request);
        }
    }
}
