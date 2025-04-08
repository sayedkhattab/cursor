<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Yamama') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=tajawal:400,500,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --color-primary: #3754a4;
            --color-primary-light: #5b77c7;
            --color-primary-dark: #2e447a;
            --color-accent: #f5a623;
            --color-text: #333;
            --color-text-light: #666;
        }
        
        body {
            font-family: 'Tajawal', sans-serif;
            background: linear-gradient(135deg, #f0f4ff 0%, #dde7ff 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            padding: 0;
            margin: 0;
            overflow-y: auto;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 10px;
        }

        .card {
            background-color: white;
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(55, 84, 164, 0.15), 0 5px 15px rgba(0, 0, 0, 0.07);
            width: 100%;
            max-width: 980px;
            overflow: hidden;
            margin: 0.5rem auto;
            display: flex;
            flex-direction: column;
        }

        .card-header {
            text-align: center;
            padding: 3rem 2rem;
            background: linear-gradient(135deg, #3754a4 0%, #5b77c7 100%);
            color: white;
            position: relative;
        }

        .card-header::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            right: 0;
            height: 20px;
            background: white;
            border-radius: 50% 50% 0 0 / 100% 100% 0 0;
        }

        .logo {
            max-width: 180px;
            margin-bottom: 1.5rem;
            filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.1));
        }

        .title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .subtitle {
            font-size: 1.2rem;
            opacity: 0.9;
            font-weight: 500;
        }

        .language-section {
            padding: 2.5rem 2rem;
        }

        .language-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 20px;
            margin-bottom: 2.5rem;
        }

        .language-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 1.5rem 1rem;
            background-color: #f8fafc;
            border-radius: 15px;
            transition: all 0.3s ease;
            text-decoration: none;
            color: var(--color-text);
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
        }

        .language-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(55, 84, 164, 0.15);
            border-color: var(--color-primary-light);
            background: radial-gradient(circle at top right, #ffffff, #f1f5fd);
        }

        .flag-container {
            width: 90px;
            height: 68px;
            margin-bottom: 1.2rem;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.15);
            position: relative;
        }

        .flag-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .language-card:hover .flag-image {
            transform: scale(1.05);
        }

        .language-name {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            text-align: center;
            color: var(--color-primary-dark);
        }

        .language-native {
            font-size: 1rem;
            color: var(--color-text-light);
            text-align: center;
        }

        .footer-note {
            text-align: center;
            margin: 0 auto;
            max-width: 700px;
            color: var(--color-text-light);
            font-size: 1rem;
            line-height: 1.6;
            padding: 1rem;
            background-color: #f8fafc;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        @media (max-width: 768px) {
            .language-grid {
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
                gap: 15px;
            }

            .flag-container {
                width: 80px;
                height: 60px;
            }

            .title {
                font-size: 1.7rem;
            }

            .subtitle {
                font-size: 1.1rem;
            }

            .card-header {
                padding: 2rem 1.5rem;
            }

            .language-section {
                padding: 2rem 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .language-grid {
                grid-template-columns: repeat(auto-fill, minmax(130px, 1fr));
                gap: 12px;
            }

            .flag-container {
                width: 70px;
                height: 53px;
            }

            .title {
                font-size: 1.5rem;
            }

            .card-header {
                padding: 1.5rem 1rem;
            }

            .language-section {
                padding: 1.5rem 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container mx-auto py-1">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html> 