<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user=Auth::guard("sanctum")->user();
        if (!$user || !$user->email_verified_at) {
            // إذا المستخدم غير موجود أو البريد الإلكتروني غير مفعل
            return response()->json(['message' => 'Email not verified'], 403);
        }
        return $next($request);
    }
}
