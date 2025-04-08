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

    .bg-sapphire-600 {
        background-color: var(--color-sapphire-600);
    }

    .hover\:bg-sapphire-700:hover {
        background-color: var(--color-sapphire-700);
    }
</style>

<nav class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex-shrink-0 flex items-center">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="يمامة" class="h-12 w-auto">
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden md:flex flex-1 items-center justify-center">
                <div class="flex space-x-2 sm:-my-px">
                    <a href="{{ route('home') }}" class="inline-flex items-center px-3 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-sapphire-800 hover:text-sapphire-900 hover:border-sapphire-500 focus:outline-none focus:border-sapphire-500 transition duration-150 ease-in-out ml-4">
                        الرئيسية
                    </a>
                    <a href="#" class="inline-flex items-center px-3 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-sapphire-800 hover:text-sapphire-900 hover:border-sapphire-500 focus:outline-none focus:border-sapphire-500 transition duration-150 ease-in-out ml-4">
                        المستويات
                    </a>
                    <a href="#" class="inline-flex items-center px-3 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-sapphire-800 hover:text-sapphire-900 hover:border-sapphire-500 focus:outline-none focus:border-sapphire-500 transition duration-150 ease-in-out ml-4">
                        التدريبات
                    </a>
                    <a href="#" class="inline-flex items-center px-3 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-sapphire-800 hover:text-sapphire-900 hover:border-sapphire-500 focus:outline-none focus:border-sapphire-500 transition duration-150 ease-in-out ml-4">
                        المكتبة
                    </a>
                    <a href="#" class="inline-flex items-center px-3 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-sapphire-800 hover:text-sapphire-900 hover:border-sapphire-500 focus:outline-none focus:border-sapphire-500 transition duration-150 ease-in-out">
                        عن المنصة
                    </a>
                </div>
            </div>

            <!-- Auth Links -->
            <div class="hidden sm:flex sm:items-center sm:mr-6">
                @auth
                    <div class="mr-3 relative">
                        <div class="flex items-center">
                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-sapphire-300 transition duration-150 ease-in-out">
                                <span class="text-sapphire-800">{{ Auth::user()->name }}</span>
                            </button>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="mr-4 text-sm text-sapphire-700 hover:text-sapphire-900">
                                    تسجيل الخروج
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-sapphire-700 hover:text-sapphire-900 mr-8 px-2">
                        تسجيل الدخول
                    </a>
                    <span class="text-sapphire-300 mx-2">|</span>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-sm text-sapphire-700 hover:text-sapphire-900 px-2">
                            التسجيل
                        </a>
                    @endif
                @endauth
                
                <!-- Language Switcher -->
                <div class="mr-4 text-sm">
                    <a href="{{ route('language.selection') }}" class="flex items-center px-3 py-1.5 rounded-md bg-sapphire-600 text-white hover:bg-sapphire-700 transition-colors duration-200 font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129" />
                        </svg>
                        <span>اللغة</span>
                    </a>
                </div>
            </div>

            <!-- Mobile menu button -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button class="inline-flex items-center justify-center p-2 rounded-md text-sapphire-600 hover:text-sapphire-900 hover:bg-sapphire-100 focus:outline-none focus:bg-sapphire-100 focus:text-sapphire-900 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state -->
    <div class="sm:hidden hidden">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('home') }}" class="block pl-3 pr-4 py-2 border-r-4 border-transparent text-base font-medium text-sapphire-800 hover:text-sapphire-900 hover:bg-sapphire-50 hover:border-sapphire-500 focus:outline-none focus:text-sapphire-900 focus:bg-sapphire-50 focus:border-sapphire-500 transition duration-150 ease-in-out">
                الرئيسية
            </a>
            <a href="#" class="block pl-3 pr-4 py-2 border-r-4 border-transparent text-base font-medium text-sapphire-800 hover:text-sapphire-900 hover:bg-sapphire-50 hover:border-sapphire-500 focus:outline-none focus:text-sapphire-900 focus:bg-sapphire-50 focus:border-sapphire-500 transition duration-150 ease-in-out">
                المستويات
            </a>
            <a href="#" class="block pl-3 pr-4 py-2 border-r-4 border-transparent text-base font-medium text-sapphire-800 hover:text-sapphire-900 hover:bg-sapphire-50 hover:border-sapphire-500 focus:outline-none focus:text-sapphire-900 focus:bg-sapphire-50 focus:border-sapphire-500 transition duration-150 ease-in-out">
                التدريبات
            </a>
            <a href="#" class="block pl-3 pr-4 py-2 border-r-4 border-transparent text-base font-medium text-sapphire-800 hover:text-sapphire-900 hover:bg-sapphire-50 hover:border-sapphire-500 focus:outline-none focus:text-sapphire-900 focus:bg-sapphire-50 focus:border-sapphire-500 transition duration-150 ease-in-out">
                المكتبة
            </a>
            <a href="#" class="block pl-3 pr-4 py-2 border-r-4 border-transparent text-base font-medium text-sapphire-800 hover:text-sapphire-900 hover:bg-sapphire-50 hover:border-sapphire-500 focus:outline-none focus:text-sapphire-900 focus:bg-sapphire-50 focus:border-sapphire-500 transition duration-150 ease-in-out">
                عن المنصة
            </a>
        </div>

        <!-- Auth Links Mobile -->
        <div class="pt-4 pb-1 border-t border-sapphire-200">
            @auth
                <div class="flex items-center px-4">
                    <div class="text-base font-medium text-sapphire-800">{{ Auth::user()->name }}</div>
                </div>
                <div class="mt-3 space-y-1">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block pl-3 pr-4 py-2 border-r-4 border-transparent text-base font-medium text-sapphire-800 hover:text-sapphire-900 hover:bg-sapphire-50 hover:border-sapphire-500 focus:outline-none focus:text-sapphire-900 focus:bg-sapphire-50 focus:border-sapphire-500 transition duration-150 ease-in-out">
                            تسجيل الخروج
                        </button>
                    </form>
                </div>
            @else
                <div class="space-y-1">
                    <a href="{{ route('login') }}" class="block pl-3 pr-4 py-2 border-r-4 border-transparent text-base font-medium text-sapphire-800 hover:text-sapphire-900 hover:bg-sapphire-50 hover:border-sapphire-500 focus:outline-none focus:text-sapphire-900 focus:bg-sapphire-50 focus:border-sapphire-500 transition duration-150 ease-in-out">
                        تسجيل الدخول
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="block pl-3 pr-4 py-2 border-r-4 border-transparent text-base font-medium text-sapphire-800 hover:text-sapphire-900 hover:bg-sapphire-50 hover:border-sapphire-500 focus:outline-none focus:text-sapphire-900 focus:bg-sapphire-50 focus:border-sapphire-500 transition duration-150 ease-in-out">
                            التسجيل
                        </a>
                    @endif
                </div>
            @endauth
            
            <!-- Language Switcher Mobile -->
            <div class="pt-2 pb-3 border-t border-sapphire-200">
                <a href="{{ route('language.selection') }}" class="flex items-center pl-3 pr-4 py-2 border-r-4 border-transparent text-base font-medium text-sapphire-800 hover:text-sapphire-900 hover:bg-sapphire-50 hover:border-sapphire-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129" />
                    </svg>
                    تغيير اللغة
                </a>
            </div>
        </div>
    </div>
</nav> 