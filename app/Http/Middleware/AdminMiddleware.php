<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * التحقق من أن المستخدم لديه صلاحيات إدارية
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // التحقق من أن المستخدم مسجل دخول وله صلاحيات إدارية
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }
        
        // إعادة توجيه المستخدم إلى الصفحة الرئيسية إذا لم يكن لديه صلاحيات إدارية
        return redirect()->route('home')->with('error', 'ليس لديك صلاحيات للوصول إلى هذه الصفحة');
    }
}
