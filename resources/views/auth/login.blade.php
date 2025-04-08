@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden shadow-lg">
        <div class="px-6 py-8">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-8">تسجيل الدخول</h2>
            
            @if ($errors->any())
                <div class="bg-red-100 border-r-4 border-red-500 text-red-700 p-4 mb-6 rounded">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form method="POST" action="{{ route('login') }}">
                @csrf
                
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
                        placeholder="أدخل كلمة المرور">
                </div>
                
                <!-- تذكرني -->
                <div class="mb-6">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="form-checkbox h-5 w-5 text-green-600">
                        <span class="mr-2 text-gray-700">تذكرني</span>
                    </label>
                </div>
                
                <!-- زر تسجيل الدخول -->
                <div class="mb-6">
                    <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-lg focus:outline-none focus:shadow-outline transition-colors">
                        تسجيل الدخول
                    </button>
                </div>
                
                <!-- روابط إضافية -->
                <div class="text-center">
                    <p class="text-gray-600">
                        ليس لديك حساب؟ 
                        <a href="{{ route('register') }}" class="text-green-600 hover:text-green-800 font-bold">سجل الآن</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 