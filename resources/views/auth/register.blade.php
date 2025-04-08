@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden shadow-lg">
        <div class="px-6 py-8">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-8">إنشاء حساب جديد</h2>
            
            @if ($errors->any())
                <div class="bg-red-100 border-r-4 border-red-500 text-red-700 p-4 mb-6 rounded">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form method="POST" action="{{ route('register') }}">
                @csrf
                
                <!-- اسم المستخدم -->
                <div class="mb-6">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">الاسم</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                        class="appearance-none border rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500"
                        placeholder="أدخل اسمك الكامل">
                </div>
                
                <!-- البريد الإلكتروني -->
                <div class="mb-6">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">البريد الإلكتروني</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                        class="appearance-none border rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500"
                        placeholder="أدخل بريدك الإلكتروني">
                </div>
                
                <!-- كلمة المرور -->
                <div class="mb-6">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">كلمة المرور</label>
                    <input type="password" name="password" id="password" required
                        class="appearance-none border rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500"
                        placeholder="أدخل كلمة المرور (8 أحرف على الأقل)">
                </div>
                
                <!-- تأكيد كلمة المرور -->
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">تأكيد كلمة المرور</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                        class="appearance-none border rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500"
                        placeholder="أدخل كلمة المرور مرة أخرى">
                </div>
                
                <!-- اللغة الأم -->
                <div class="mb-6">
                    <label for="native_language" class="block text-gray-700 text-sm font-bold mb-2">اللغة الأم</label>
                    <select name="native_language" id="native_language" 
                        class="appearance-none border rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                        <option value="" selected disabled>اختر لغتك الأم</option>
                        <option value="English" {{ old('native_language') == 'English' ? 'selected' : '' }}>الإنجليزية</option>
                        <option value="French" {{ old('native_language') == 'French' ? 'selected' : '' }}>الفرنسية</option>
                        <option value="Spanish" {{ old('native_language') == 'Spanish' ? 'selected' : '' }}>الإسبانية</option>
                        <option value="German" {{ old('native_language') == 'German' ? 'selected' : '' }}>الألمانية</option>
                        <option value="Chinese" {{ old('native_language') == 'Chinese' ? 'selected' : '' }}>الصينية</option>
                        <option value="Japanese" {{ old('native_language') == 'Japanese' ? 'selected' : '' }}>اليابانية</option>
                        <option value="Korean" {{ old('native_language') == 'Korean' ? 'selected' : '' }}>الكورية</option>
                        <option value="Russian" {{ old('native_language') == 'Russian' ? 'selected' : '' }}>الروسية</option>
                        <option value="other" {{ old('native_language') == 'other' ? 'selected' : '' }}>أخرى</option>
                    </select>
                </div>
                
                <!-- زر إنشاء الحساب -->
                <div class="mb-6">
                    <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-lg focus:outline-none focus:shadow-outline transition-colors">
                        إنشاء حساب
                    </button>
                </div>
                
                <!-- روابط إضافية -->
                <div class="text-center">
                    <p class="text-gray-600">
                        لديك حساب بالفعل؟ 
                        <a href="{{ route('login') }}" class="text-green-600 hover:text-green-800 font-bold">تسجيل الدخول</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 