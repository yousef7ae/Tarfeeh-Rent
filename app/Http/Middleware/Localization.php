<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->language) {
            $locale = $request->language;
        } else if (Session::has('language')) {
            $locale = Session::get('language');
        } else if (request('language')) {
            $locale = request('language');
        } else {
            $locale = 'ar';
        }

        Session::put('language', $locale);
        // Check header request and determine localizaton
        $local = ($request->hasHeader('language')) ? $request->header('language') : $locale;

        // set laravel localization
        app()->setLocale($local);

        return $next($request);
    }
}
