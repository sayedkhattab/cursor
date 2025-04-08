<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LanguageSelectionMiddleware
{
    /**
     * التحقق ما إذا كان المستخدم قد اختار لغته أم لا
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // إذا كان المستخدم يحاول اختيار اللغة، دعه يمر
        if ($request->is('language/*')) {
            return $next($request);
        }

        // إذا كان المستخدم مسجل الدخول ولديه لغة معرفة
        if (auth()->check() && auth()->user()->native_language) {
            // تخزين اللغة في الجلسة
            session(['native_language' => auth()->user()->native_language]);
            return $next($request);
        }

        // التحقق من وجود اللغة في الكوكيز
        if ($request->cookie('native_language') || session('native_language')) {
            return $next($request);
        }

        // توجيه المستخدم إلى صفحة اختيار اللغة
        return redirect()->route('language.selection');
    }
}
