<nav x-data="{ open: false }" class="bg-slate-900">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- LOGO + LINKS -->
            <div class="flex">

                
                @auth
                <!-- Logado -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-16 w-auto" />
                    </a>
                </div>
                @endauth

                
                @guest
                <!-- Visitante -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block h-16 w-auto" />
                    </a>
                </div>
                @endguest

                @auth
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        Dashboard
                    </x-nav-link>
                </div>
                @endauth

                @guest
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('jobs')">
                        Vagas
                    </x-nav-link>
                </div>
                @endguest

            </div>

            <!-- RIGHT SIDE -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">

                
                @auth
                <!--  LOGADO -->
                <x-dropdown align="right" width="48">

                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 text-sm rounded-md text-gray-500">
                            <div>{{ auth()->user()->name }}</div>

                            <div class="ms-1">
                                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('account.edit')">
                            Account
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                Log Out
                            </x-dropdown-link>
                        </form>
                    </x-slot>

                </x-dropdown>
                @endauth


                
                @guest
                <!--  VISITANTE -->
                <div class="flex space-x-4">
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900">
                        Login
                    </a>

                    <a href="{{ route('register') }}" class="text-gray-600 hover:text-gray-900">
                        Register
                    </a>
                </div>
                @endguest

            </div>

            <!-- MOBILE MENU -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="p-2 text-gray-400">
                    ☰
                </button>
            </div>

        </div>
    </div>

    <!-- MOBILE -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">

        @auth
        <div class="px-4 py-2">
            <div class="text-gray-800 font-medium">
                {{ auth()->user()->name }}
            </div>

            <div class="text-sm text-gray-500">
                {{ auth()->user()->email }}
            </div>
        </div>

        <x-responsive-nav-link :href="route('dashboard')">
            Dashboard
        </x-responsive-nav-link>

        <x-responsive-nav-link :href="route('account.edit')">
            Account
        </x-responsive-nav-link>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-responsive-nav-link :href="route('logout')"
                onclick="event.preventDefault(); this.closest('form').submit();">
                Log Out
            </x-responsive-nav-link>
        </form>
        @endauth


        @guest
        <x-responsive-nav-link :href="route('login')">
            Login
        </x-responsive-nav-link>

        <x-responsive-nav-link :href="route('register')">
            Register
        </x-responsive-nav-link>
        @endguest

    </div>

</nav>