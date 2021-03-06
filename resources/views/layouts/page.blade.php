<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ 'BrainR'}}</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet">
</head>

<body class="leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;">

<div id="app">

    <!--Nav-->
    <nav id="header" class="fixed w-full z-30 top-0 text-white">

        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">

            <div class="pl-4 flex items-center">
                <a class="text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl toggleColour"
                   href="#"
                >
                    BrainR
                </a>
            </div>

            <div class="block lg:hidden pr-4">
                <button id="nav-toggle" class="flex items-center p-1 text-orange-800 hover:text-gray-900">
                    <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
                    </svg>
                </button>
            </div>

            <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-white lg:bg-transparent text-black p-4 lg:p-0 z-20"
                 id="nav-content"
            >
                <ul class="list-reset lg:flex justify-end flex-1 items-center">
                    @guest
                        <li class="nav-item">
                            <a href="{{ route(Route::currentRouteName(),['lang'=>'en']) }}" class = "inline-block text-white no-underline hover:text-gray-800 hover:text-underline py-2 px-4">EN</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route(Route::currentRouteName(),['lang'=>'nl']) }}" class = "inline-block text-white no-underline hover:text-gray-800 hover:text-underline py-2 px-4">NL</a>
                        </li>
                        <li class="mr-3">
                            <a class="inline-block text-white no-underline hover:text-gray-800 hover:text-underline py-2 px-4"
                               href="{{ route('login')}}"
                            >{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="mr-3">
                                <a class="inline-block text-white no-underline hover:text-gray-800 hover:text-underline py-2 px-4"
                                   href="{{ route('register') }}"
                                >{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="mr-3 relative">
                            <dropdown>
                                <template #toggle>
                                    <a class="inline-block text-white no-underline hover:text-gray-800 hover:text-underline py-2 px-4">
                                        {{ Auth::user()->name }}
                                    </a>
                                </template>

                                <div class="absolute top-auto right-0 bg-white border-b-2 rounded shadow"
                                     style="min-width: 150px;"
                                >
                                    <ul class="">
                                        <li class="mr-3">
                                            <a class="inline-block no-underline hover:text-gray-800 hover:text-underline py-2 px-4"
                                               href="{{ route('home') }}"
                                            >
                                                Dashboard
                                            </a>
                                        </li>
                                        <li class="mr-3">
                                            <a class="inline-block no-underline hover:text-gray-800 hover:text-underline py-2 px-4"
                                               href="{{ route('logout') }}"
                                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                            >
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form"
                                                  action="{{ route('logout') }}"
                                                  method="POST"
                                                  style="display: none;"
                                            >
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </dropdown>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>

        <hr class="border-b border-gray-100 opacity-25 my-0 py-0"/>
    </nav>


@yield('content')


<!--Footer-->
    <footer class="bg-white">
        <div class="container mx-auto  px-8">

            <div class="w-full flex flex-col md:flex-row py-6">

                <div class="flex-1 mb-6">

                    <a class="text-gray-800 no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">
                        Brain<span class="text-orange-500">R</span>
                    </a>
                </div>


                <div class="flex-1">
                    <p class="uppercase text-gray-500 md:mb-6">Links</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#" class="no-underline hover:underline text-gray-800 hover:text-orange-500">FAQ</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                               class="no-underline hover:underline text-gray-800 hover:text-orange-500"
                            >Help</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                               class="no-underline hover:underline text-gray-800 hover:text-orange-500"
                            >Support</a>
                        </li>
                    </ul>
                </div>
                <div class="flex-1">
                    <p class="uppercase text-gray-500 md:mb-6">Legal</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                               class="no-underline hover:underline text-gray-800 hover:text-orange-500"
                            >Terms</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                               class="no-underline hover:underline text-gray-800 hover:text-orange-500"
                            >Privacy</a>
                        </li>
                    </ul>
                </div>
                <div class="flex-1">
                    <p class="uppercase text-gray-500 md:mb-6">Social</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                               class="no-underline hover:underline text-gray-800 hover:text-orange-500"
                            >Facebook</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                               class="no-underline hover:underline text-gray-800 hover:text-orange-500"
                            >Linkedin</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                               class="no-underline hover:underline text-gray-800 hover:text-orange-500"
                            >Twitter</a>
                        </li>
                    </ul>
                </div>
                <div class="flex-1">
                    <p class="uppercase text-gray-500 md:mb-6">Company</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                               class="no-underline hover:underline text-gray-800 hover:text-orange-500"
                            >Official Blog</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                               class="no-underline hover:underline text-gray-800 hover:text-orange-500"
                            >About Us</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                               class="no-underline hover:underline text-gray-800 hover:text-orange-500"
                            >Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <a href="https://www.freepik.com/free-photos-vectors/background"
           class="text-gray-500"
        >Background vector created by freepik - www.freepik.com</a>

    </footer>

</div>

<script src="{{ mix('js/app.js') }}"></script>


</body>

</html>
