@extends('layouts.simple')

@section('content')
<div class="language-selection-container">
    <div class="header-section">
        <div class="logo-wrapper">
            <img src="{{ asset('images/logo.png') }}" alt="يمامة - تعلم العربية" class="logo">
        </div>
        <h1>مرحباً بك في منصة يمامة لتعلم اللغة العربية</h1>
        <p>يرجى اختيار اللغة المفضلة لديك</p>
    </div>
    
    <div class="languages-wrapper">
        <div class="languages-grid">
            @foreach(config('languages.supported_languages') as $code => $language)
                <a href="{{ route('language.set', ['language' => $code]) }}" class="language-option" title="اختر {{ $language['name_ar'] }}">
                    <div class="flag-wrapper">
                        <img src="{{ asset('images/flags/' . $code . '.svg') }}" alt="{{ $language['name'] }}" class="flag">
                    </div>
                    <div class="language-details">
                        <span class="language-name">{{ $language['name_ar'] }}</span>
                        <span class="language-native">{{ $language['native_name'] }}</span>
                    </div>
                </a>
            @endforeach
        </div>
        
        <p class="plain-footer-text">بعد اختيار اللغة، سيتم تذكر اختيارك في الزيارات القادمة. يمكنك تغيير اللغة في أي وقت من الإعدادات.</p>
    </div>
</div>

<style>
    /* متغيرات الألوان والخصائص */
    :root {
        --primary-color: #4361ee;
        --primary-dark: #3949ab;
        --primary-light: #738aff;
        --secondary-color: #ff4081;
        --bg-color: #3754a4;
        --bg-pattern: rgba(67, 97, 238, 0.05);
        --card-bg: #ffffff;
        --card-hover: #f0f4ff;
        --text-primary: #333333;
        --text-secondary: #5f6789;
        --shadow-color: rgba(0, 0, 0, 0.1);
        --header-gradient-1: #f8f9ff;
        --header-gradient-2: #edf0ff;
        --header-text-color: #3754a4;
    }

    /* ضبط عام */
    body {
        font-family: 'Tajawal', sans-serif;
        background-color: var(--bg-color);
        background-image: none;
        color: var(--text-primary);
        margin: 0;
        padding: 0;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        padding-top: 1rem;
        overflow-y: auto;
    }

    /* حاوية الصفحة */
    .language-selection-container {
        width: 95%;
        max-width: 1100px;
        background: var(--card-bg);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px var(--shadow-color);
        display: flex;
        flex-direction: column;
        margin: 0.5rem auto 1rem;
    }

    /* منطقة الرأس */
    .header-section {
        background: linear-gradient(135deg, var(--header-gradient-1), var(--header-gradient-2));
        padding: 2rem 1rem;
        text-align: center;
        position: relative;
        overflow: hidden;
        border-bottom: 1px solid rgba(67, 97, 238, 0.1);
    }

    .header-section::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(rgba(67, 97, 238, 0.05), transparent 70%);
        opacity: 0.6;
        z-index: 1;
    }

    .header-section * {
        position: relative;
        z-index: 2;
    }

    .logo-wrapper {
        display: flex;
        justify-content: center;
        margin-bottom: 1rem;
    }

    .logo {
        height: 70px;
        width: auto;
        filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.1));
    }

    .header-section h1 {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        letter-spacing: -0.5px;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        color: var(--header-text-color);
    }

    .header-section p {
        font-size: 1.2rem;
        opacity: 0.9;
        margin-top: 0;
        font-weight: 500;
        color: var(--header-text-color);
    }

    /* منطقة اللغات */
    .languages-wrapper {
        padding: 2rem 1.5rem;
        position: relative;
    }

    .languages-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .language-option {
        background: #f8f9ff;
        border-radius: 16px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        text-decoration: none;
        color: var(--text-primary);
        transition: transform 0.3s ease, background-color 0.3s ease, box-shadow 0.3s ease;
        position: relative;
        border: 1px solid rgba(67, 97, 238, 0.1);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .language-option:hover {
        transform: translateY(-8px);
        background-color: var(--card-hover);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
        border-color: var(--primary-light);
    }

    .language-option::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.5s ease;
    }

    .language-option:hover::after {
        transform: scaleX(1);
    }

    .flag-wrapper {
        padding: 1.5rem;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgba(67, 97, 238, 0.03);
        position: relative;
        overflow: hidden;
        height: 120px;
    }

    .flag-wrapper::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(rgba(67, 97, 238, 0.1), transparent 70%);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .language-option:hover .flag-wrapper::before {
        opacity: 1;
    }

    .flag {
        width: 100px;
        height: 70px;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.5s ease;
    }

    .language-option:hover .flag {
        transform: scale(1.1);
    }

    .language-details {
        padding: 1.5rem;
        text-align: center;
    }

    .language-name {
        display: block;
        font-size: 1.4rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        color: var(--primary-dark);
    }

    .language-native {
        display: block;
        color: var(--text-secondary);
        font-size: 1.1rem;
    }

    .plain-footer-text {
        text-align: center;
        color: var(--text-secondary);
        font-size: 1rem;
        line-height: 1.6;
        max-width: 800px;
        margin: 0 auto;
    }

    /* تحسينات للأجهزة المختلفة */
    @media (max-width: 992px) {
        .languages-grid {
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 1.5rem;
        }
        
        .flag {
            width: 90px;
            height: 60px;
        }
        
        .flag-wrapper {
            height: 100px;
        }
    }

    @media (max-width: 768px) {
        .header-section h1 {
            font-size: 1.8rem;
        }
        
        .header-section p {
            font-size: 1.1rem;
        }
        
        .language-name {
            font-size: 1.2rem;
        }
        
        .language-native {
            font-size: 1rem;
        }
        
        .languages-grid {
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            gap: 1.25rem;
        }
    }

    @media (max-width: 576px) {
        .language-selection-container {
            width: 95%;
            margin: 1rem;
            border-radius: 15px;
        }
        
        .header-section {
            padding: 2rem 1rem;
        }
        
        .languages-wrapper {
            padding: 2rem 1rem;
        }
        
        .languages-grid {
            grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
            gap: 1rem;
        }
        
        .language-details {
            padding: 1rem;
        }
        
        .flag-wrapper {
            padding: 1rem;
            height: 90px;
        }
        
        .flag {
            width: 80px;
            height: 55px;
        }
    }
</style>
@endsection 