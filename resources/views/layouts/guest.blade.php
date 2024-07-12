<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
        content="site internet d'archivage d'artistes et leurs oeuvres pour l'associations l'atelier du sud basé à Besançon">
    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel=" preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.bunny.net/css?family=amita:400,700" rel="stylesheet" />
    <link href="https://fonts.bunny.net/css?family=amaranth:400,400i,700,700i" rel="stylesheet" />
    <link href="https://fonts.bunny.net/css?family=barriecito:400" rel="stylesheet" />
    <link href="https://fonts.bunny.net/css?family=lacquer:400" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('logoatelierdusud.png') }}" type="image/x-icon">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="overflow-x-hidden scroll-x-hidden">

    <header x-data="{ open: false }" class="fixed inset-x-0 top-0 z-50">
        <nav class="flex items-center justify-between px-6 py-2 lg:px-8 backdrop-blur-sm bg-white/30 scroll-x-hidden"
            aria-label="Global">
            <div class="flex lg:flex-1 flex-row">
                <a href="#" class="-m-1.5 p-1.5">
                    <span class="sr-only">{{ config('app.name') }}</span>
                    <img class="h-14 w-auto"
                        src="https://cdn.discordapp.com/attachments/1087640959958929408/1156907729500241980/8347-removebg-preview.png?ex=6516adc9&is=65155c49&hm=451e7c3efeef2ff8d5a95acc8c6ac166746c4b5e4d73ead4d03a6cfc0a251b61&"
                        alt="">
                </a>

                <div class="flex lg:hidden">
                    <button @click="open = !open" type="button"
                        class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-white">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-6 w-6 fill-current text-black" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>


                <div>
                    <div>
                        <div class=" hidden lg:flex lg:gap-x-12 items-center justify-evenly">
                            <x-application-logo class="hidden lg:flex-1 lg:flex-1 lg:justify-end" />
                            <a href=" {{ route('welcome') }}"
                                class="text-md font-lacquer tracking-widest leading-6 text-gray-900 border-b-2 hover:border-yellow-300 transition-all duration-300 {{ request()->routeIs('welcome') ? 'border-yellow-300' : 'border-transparent' }}">
                                Accueil</a>
                            <a href="{{ route('front.artists.index') }}"
                                class="text-md font-lacquer tracking-widest leading-6 text-gray-900 border-b-2 hover:border-yellow-300 transition-all duration-300 {{ request()->routeIs('front.artists.*') ? 'border-yellow-300' : 'border-transparent' }}">Artistes</a>
                            <a href="{{ route('works') }}"
                                class="text-md font-lacquer tracking-widest leading-6 text-gray-900 border-b-2 hover:border-yellow-300 transition-all duration-300 {{ request()->routeIs('works') ? 'border-yellow-300' : 'border-transparent' }}">Oeuvres</a>
                            <a href="#formulaire" id="form"
                                class=" text-md font-lacquer tracking-widest leading-6 text-gray-900 border-b-2
                            hover:border-yellow-300 transition-all duration-300
                            {{ request()->routeIs('contact') ? 'border-yellow-300' : 'border-transparent' }}">Formulaire
                            </a>
                        </div>
                    </div>
                    <div class="lg:flex lg:flex-1 lg:justify-end">
                        @if (Route::has('login'))
                        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">

                            <a href="{{ route('login') }}"
                                class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Se
                                connecter</a>
                            @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">S'inscrire</a>
                            @endif
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </nav>
        <!-- Mobile menu, show/hide based on menu open state. -->
        <div x-cloak x-show="open" class="lg:hidden" role="dialog" aria-modal="true">
            <!-- Background backdrop, show/hide based on slide-over state. -->
            <div class="fixed inset-0 z-50 bg-white/30 backdrop-blur-sm">
                <div
                    class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto backdrop-blur-sm bg-white/30  px-6 pt-2 pb-6 sm:max-w-sm sm:ring-1 sm:ring-white/10">
                    <div class="flex items-center justify-between">
                        <a href="#" class="-m-1.5 p-1.5">
                            <span class="sr-only">{{ config('app.name') }}</span>
                            <img class="h-14 w-auto"
                                src="https://cdn.discordapp.com/attachments/1087640959958929408/1156907729500241980/8347-removebg-preview.png?ex=6516adc9&is=65155c49&hm=451e7c3efeef2ff8d5a95acc8c6ac166746c4b5e4d73ead4d03a6cfc0a251b61&"
                                alt="">
                        </a>
                        <button @click="open = !open" type="button"
                            class="-m-2.5 rounded-md p-2.5 text-gray-400 scroll-x-none">
                            <span class="sr-only">Close menu</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="gray-50"
                                aria-hidden="true">
                                <path stroke-linecap="black" stroke-linejoin="black" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="mt-6 flow-root">
                        <div
                            class="-my-6 divide-y divide-gray-500/25 sm:fixed sm:top-0 sm:right-0 p-6 text-right justify-around items-center">


                            <div class="space-y-2 mx-6 py-6 backdrop-blur-sm">
                                <x-application-logo" />
                                <a href="{{ route('welcome') }}"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-800 hover:bg-gray-100">Accueil</a>
                                <a href="{{ route('front.artists.index') }}"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-800 hover:bg-gray-100">Artistes</a>
                                <a href="{{ route('works') }}"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-800 hover:bg-gray-100">Oeuvres</a>
                                <a href="#formulaire" id="form" class=" -mx-3 block rounded-lg px-3 py-2 text-base
                                    font-semibold leading-7 text-gray-800 hover:bg-gray-100 hover:border-yellow-300
                                    transition-all duration-300">Formulaire</a>

                            </div>
                            <div class="space-y-2 mx-6 py-6">
                                @if (Route::has('login'))
                                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-left">
                                    @auth

                                    <a href="{{ route('login') }}"
                                        class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-yellow-300">Se
                                        connecter</a>

                                    @if (Route::has('register')) <a href="{{ route('register') }}"
                                        class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-yellow-300">
                                        S'inscrire</a>
                                    @endif
                                    @endauth
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </header>

    <div class="font-sans text-gray-900 antialiased scroll-x-none">
        {{ $slot }}
    </div>
    @include('contact')
    <div class="flex items center justify-between px-5">
        <div class="flex justify-end space-x-6 md:order-2">
            <a href="https://www.facebook.com" class="text-gray-400 hover:text-yellow-500">
                <span class="sr-only">Facebook</span>
                <svg class="h-3 w-3 md:h-6 md:w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                        clip-rule="evenodd" />
                </svg>
            </a>
            <a href="https://www.instagram.com" class="text-gray-400 hover:text-yellow-500">
                <span class="sr-only">Instagram</span>
                <svg class="h-3 w-3 md:h-6 md:w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                        clip-rule="evenodd" />
                </svg>
            </a>
            <a href="https://twitter.com" class="text-gray-400 hover:text-yellow-500">
                <span class="sr-only">Twitter</span>
                <svg class="h-3 w-3 md:h-6 md:w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path
                        d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                </svg>
            </a>
            <a href="https://github.com" class="text-gray-400 hover:text-yellow-500">
                <span class="sr-only">GitHub</span>
                <svg class="h-3 w-3 md:h-6 md:w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                        clip-rule="evenodd" />
                </svg>
            </a>
            <a href="https://www.youtube.com" class="text-gray-400 hover:text-yellow-500">
                <span class="sr-only">YouTube</span>
                <svg class="h-3 w-3 md:h-6 md:w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 0 1-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 0 1-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 0 1 1.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418ZM15.194 12 10 15V9l5.194 3Z"
                        clip-rule="evenodd" />
                </svg>
            </a>
        </div>
        <div class="mt-8 md:order-1 md:mt-0 text-left md:text-right">
            <p class="text-center text-xs leading-5 text-gray-500 ">
                &copy; 2023 L'atelier du Sud. Tout droits réservés.
            </p>
        </div>

    </div>
    </footer>
    @livewireScripts
</body>

</html>