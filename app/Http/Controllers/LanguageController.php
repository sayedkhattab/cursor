<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class LanguageController extends Controller
{
    /**
     * عرض صفحة اختيار اللغة
     */
    public function showLanguageSelection()
    {
        return view('language-selection');
    }

    /**
     * تعيين اللغة المختارة
     */
    public function setLanguage($language)
    {
        // التحقق من أن اللغة المختارة مدعومة
        if (!array_key_exists($language, config('languages.supported_languages'))) {
            return redirect()->route('language.selection')
                ->with('error', 'اللغة المختارة غير مدعومة.');
        }

        // إذا كان المستخدم مسجل الدخول، قم بتحديث لغته
        if (auth()->check()) {
            $user = auth()->user();
            $user->native_language = $language;
            $user->save();
        }

        // تخزين اللغة في الجلسة والكوكيز
        session(['native_language' => $language]);
        
        // إنشاء كوكي يدوم لمدة 365 يوم
        Cookie::queue('native_language', $language, 60 * 24 * 365);

        // إعادة توجيه المستخدم إلى الصفحة الرئيسية بدون إشعار نجاح
        return redirect()->route('home');
    }
}
