<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'منصة تعليم اللغة العربية') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=tajawal:400,500,700&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Custom Styles -->
    <style>
        :root {
            --color-sapphire-50: #f1f6fd;
            --color-sapphire-100: #e0ecf9;
            --color-sapphire-200: #c8ddf5;
            --color-sapphire-300: #a3c8ed;
            --color-sapphire-400: #77aae3;
            --color-sapphire-500: #578dda;
            --color-sapphire-600: #4272ce;
            --color-sapphire-700: #3951bc;
            --color-sapphire-800: #3754a4;
            --color-sapphire-900: #2e447a;
            --color-sapphire-950: #202b4b;
        }
        
        .text-sapphire-500 { color: var(--color-sapphire-500); }
        .text-sapphire-700 { color: var(--color-sapphire-700); }
        .text-sapphire-800 { color: var(--color-sapphire-800); }
        
        .bg-sapphire-500 { background-color: var(--color-sapphire-500); }
        
        body {
            font-family: 'Tajawal', sans-serif;
            height: 100vh;
            overflow-y: hidden;
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900 h-full">
    <div class="flex flex-col h-full">
        <!-- Header/Navigation -->
        @include('layouts.navigation')

        <!-- Flash Messages -->
        @if (session('success'))
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-2">
                <div class="bg-green-100 border-r-4 border-green-500 text-green-700 p-3 rounded">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-2">
                <div class="bg-red-100 border-r-4 border-red-500 text-red-700 p-3 rounded">
                    {{ session('error') }}
                </div>
            </div>
        @endif

        <!-- Page Content -->
        <main class="flex-1 overflow-auto">
            @yield('content')
        </main>

        <!-- Footer -->
        @include('layouts.footer')
    </div>
    
    <!-- إضافة JavaScript لإخفاء الإشعارات تلقائياً -->
    <script>
        // انتظر حتى يتم تحميل الصفحة بالكامل
        document.addEventListener('DOMContentLoaded', function() {
            // البحث عن إشعارات النجاح
            const successMessages = document.querySelectorAll('.bg-green-100');
            
            // إذا وجدت إشعارات، قم بإخفائها بعد ثانيتين
            if (successMessages.length > 0) {
                // قياس ارتفاع الإشعار قبل إخفائه
                const alertHeight = successMessages[0].offsetHeight;
                
                setTimeout(function() {
                    successMessages.forEach(function(element) {
                        // تغيير الشفافية أولاً للحصول على تأثير تلاشي
                        element.style.transition = 'opacity 0.5s ease';
                        element.style.opacity = '0';
                        
                        // بعد انتهاء التلاشي، اخفاء المحتوى مع الحفاظ على المساحة
                        setTimeout(function() {
                            element.style.visibility = 'hidden';
                            // الحفاظ على نفس ارتفاع العنصر
                            element.parentNode.style.height = alertHeight + 'px';
                            element.parentNode.style.marginBottom = '1rem';
                        }, 500);
                    });
                }, 2000); // 2000 مللي ثانية = ثانيتين
            }
        });
    </script>
</body>
</html> 