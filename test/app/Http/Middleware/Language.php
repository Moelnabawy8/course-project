<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\traits\ApiTrait;
use Illuminate\Support\Facades\App;

class Language
{
    use ApiTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $language=$request->header("Accept-Language");

        if (is_null($language)) {
            return $this->ErrorMessage([],"language is missing", 422);
        }
        $allowedlanguages = ['ar', 'en'];

        if (!in_array($language,$allowedlanguages)) {
         return $this->ErrorMessage([],"language is invalid", 422);
        }

        // Set the application locale
        App::setLocale($language);
                return $next($request);
    }
}
