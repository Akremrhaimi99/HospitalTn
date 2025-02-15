<nav x-data="{ open: false }" class="border-b border-gray-100" style="background-color: #45a049; color: white;">
    <style>
        /* Suppression des bordures ou contours inutiles */
        .active-nav-link {
            border: none !important;
            box-shadow: none !important;
            outline: none;
        }

        /* Suppression du contour bleu au focus */
        a:focus, a:active {
            outline: none;
        }
    </style>

    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Left Section: Logo -->
            <div class="flex items-center">
                <div class="shrink-0" style="padding: 10px; border-radius: 5px;">
                    <a href="{{ route('dashboard') }}" style="text-decoration: none; color: #ffffff;">
                        <h1 style="font-size: 2rem; font-weight: bold;">Hospital</h1>
                    </a>
                </div>
            </div>

            <!-- Center Section: Dashboard -->
            <div class="flex-1 text-center">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" 
                    style="font-size: 1.5rem; font-weight: bold; color: white; text-decoration: none;"
                    class="active-nav-link">
                    Dashboard
                </x-nav-link>
            </div>

            <!-- Right Section: User Dropdown -->
            <div class="hidden sm:flex sm:items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-transparent hover:bg-green-700 focus:outline-none">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>
