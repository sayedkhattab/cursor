<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\LanguageController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\LanguageSelectionMiddleware;

// مسارات اختيار اللغة (يجب أن تكون قبل middleware اللغة)
Route::get('/language/selection', [LanguageController::class, 'showLanguageSelection'])->name('language.selection');
Route::get('/language/set/{language}', [LanguageController::class, 'setLanguage'])->name('language.set');

// مجموعة الطرق التي تحتاج إلى اختيار اللغة
Route::middleware([LanguageSelectionMiddleware::class])->group(function () {
    // الصفحة الرئيسية
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // طرق المصادقة (تسجيل الدخول والتسجيل)
    Route::middleware('guest')->group(function () {
        // تسجيل الدخول
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AuthController::class, 'login']);
        
        // تسجيل حساب جديد
        Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
        Route::post('/register', [AuthController::class, 'register']);
    });

    // تسجيل الخروج
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

    // المسارات المحمية بتسجيل الدخول
    Route::middleware(['auth'])->group(function () {
        // صفحة الملف الشخصي
        Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
        
        // هنا ستضاف الطرق الأخرى التي تحتاج إلى تسجيل دخول
    });

    // طرق خاصة بلوحة التحكم للمدير
    Route::prefix('admin')
        ->middleware(['auth', AdminMiddleware::class])
        ->group(function () {
            // لوحة التحكم الرئيسية
            Route::get('/', [HomeController::class, 'adminDashboard'])->name('admin.dashboard');
            
            // هنا ستضاف طرق لوحة التحكم للمدير
        });
});
