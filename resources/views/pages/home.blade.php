@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center justify-center text-center px-4 py-8 bg-white h-full">
    <div class="max-w-xl mx-auto">
        <img src="{{ asset('images/logo.png') }}" alt="منصة يمامة" class="w-48 h-auto mx-auto mb-6">
        
        <h1 class="text-2xl md:text-3xl font-bold text-sapphire-800 mb-4">جارٍ العمل على تصميم منصة يمامة</h1>
        
        <div class="w-16 h-1 bg-sapphire-500 mx-auto mb-4"></div>
        
        <p class="text-base text-sapphire-700 mb-6 max-w-md mx-auto">
            نعمل حالياً على تطوير وتصميم المنصة لنقدم لكم تجربة تعليمية فريدة ومميزة. ترقبوا الإطلاق قريباً.
        </p>
        
        <div class="flex justify-center">
            <!-- يمكن إضافة أزرار هنا إذا لزم الأمر -->
        </div>
    </div>
</div>
@endsection 