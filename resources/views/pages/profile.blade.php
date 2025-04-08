@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- بطاقة الملف الشخصي -->
        <div class="bg-white overflow-hidden shadow-lg rounded-lg p-6 mb-8">
            <div class="flex flex-col md:flex-row items-center">
                <!-- صورة الملف الشخصي -->
                <div class="md:ml-6 mb-6 md:mb-0 flex justify-center">
                    <div class="h-32 w-32 bg-green-100 rounded-full flex items-center justify-center text-4xl font-bold text-green-600">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                </div>
                
                <!-- معلومات المستخدم -->
                <div class="text-center md:text-right flex-1">
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">{{ Auth::user()->name }}</h2>
                    <p class="text-gray-600 mb-2">{{ Auth::user()->email }}</p>
                    <p class="text-green-600 font-semibold mb-4">المستوى: {{ __('levels.' . Auth::user()->level) }}</p>
                    
                    <div class="flex flex-wrap justify-center md:justify-start space-x-2 space-x-reverse">
                        <span class="bg-green-100 text-green-800 text-sm font-medium ml-2 px-3 py-1 rounded">{{ Auth::user()->points }} نقطة</span>
                        @if (Auth::user()->native_language)
                            <span class="bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded">اللغة الأم: {{ Auth::user()->native_language }}</span>
                        @endif
                    </div>
                </div>
                
                <!-- زر التعديل -->
                <div class="mt-6 md:mt-0">
                    <button class="btn-secondary">
                        تعديل الملف الشخصي
                    </button>
                </div>
            </div>
        </div>
        
        <!-- إحصائيات التعلم -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white overflow-hidden shadow-lg rounded-lg p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4">الإنجازات</h3>
                <div class="flex items-center justify-between">
                    <span class="text-3xl font-bold text-green-600">0</span>
                    <svg class="h-10 w-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                    </svg>
                </div>
            </div>
            
            <div class="bg-white overflow-hidden shadow-lg rounded-lg p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4">الدروس المكتملة</h3>
                <div class="flex items-center justify-between">
                    <span class="text-3xl font-bold text-green-600">0</span>
                    <svg class="h-10 w-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
            
            <div class="bg-white overflow-hidden shadow-lg rounded-lg p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4">أيام متتالية</h3>
                <div class="flex items-center justify-between">
                    <span class="text-3xl font-bold text-green-600">0</span>
                    <svg class="h-10 w-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
        </div>
        
        <!-- خط سير التعلم -->
        <div class="bg-white overflow-hidden shadow-lg rounded-lg p-6 mb-8">
            <h3 class="text-xl font-bold text-gray-800 mb-6">خط سير التعلم</h3>
            
            <div class="space-y-6">
                <div>
                    <div class="flex justify-between mb-2">
                        <h4 class="font-semibold text-gray-800">الحروف الأبجدية</h4>
                        <span class="text-green-600">0/28</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-value" style="width: 0%"></div>
                    </div>
                </div>
                
                <div>
                    <div class="flex justify-between mb-2">
                        <h4 class="font-semibold text-gray-800">المفردات الأساسية</h4>
                        <span class="text-green-600">0/100</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-value" style="width: 0%"></div>
                    </div>
                </div>
                
                <div>
                    <div class="flex justify-between mb-2">
                        <h4 class="font-semibold text-gray-800">قواعد النحو البسيطة</h4>
                        <span class="text-green-600">0/20</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-value" style="width: 0%"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- الألعاب المقترحة -->
        <div class="bg-white overflow-hidden shadow-lg rounded-lg p-6">
            <h3 class="text-xl font-bold text-gray-800 mb-6">اقتراحات التعلم</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="feature-card">
                    <h4 class="font-bold text-gray-800 mb-3">تعلم الحروف</h4>
                    <p class="text-gray-600 mb-4">البدء بتعلم الحروف الأبجدية العربية ونطقها الصحيح.</p>
                    <a href="#" class="btn-primary inline-block">ابدأ الآن</a>
                </div>
                
                <div class="feature-card">
                    <h4 class="font-bold text-gray-800 mb-3">مطابقة الكلمات</h4>
                    <p class="text-gray-600 mb-4">لعبة مطابقة الكلمات العربية مع صورها المناسبة.</p>
                    <a href="#" class="btn-primary inline-block">ابدأ الآن</a>
                </div>
                
                <div class="feature-card">
                    <h4 class="font-bold text-gray-800 mb-3">تحدي النطق</h4>
                    <p class="text-gray-600 mb-4">تدرب على نطق الكلمات العربية بشكل صحيح.</p>
                    <a href="#" class="btn-primary inline-block">ابدأ الآن</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 