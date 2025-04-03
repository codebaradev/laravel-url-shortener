<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center ">
                    <a href="{{ route('dashboard') }}" class="flex gap-2">
                        <svg width="20px" fill="#38fcff" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 484.525 484.525" xml:space="preserve" stroke="#38fcff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M248.59,55.104c-25.033-24.254-59.491-36.528-94.342-33.862c-29.776,2.259-57.676,15.698-78.604,36.957 c-4.063,4.127-12.25,12.313-16.375,16.375c-21.259,20.932-34.7,48.83-36.958,78.605c-2.666,34.851,9.608,69.308,33.861,94.342 l55.332,56.387c6.388,6.51,15.111,10.194,24.231,10.238c9.119,0.043,17.878-3.562,24.326-10.01l17.064-17.062 c13.263-13.264,13.358-34.737,0.213-48.117L122.56,183.2c-10.853-11.177-10.459-30.734,0.638-41.674 c4.885-4.814,14.581-14.513,19.396-19.396c10.938-11.096,30.497-11.49,41.674-0.637l55.754,54.777 c13.38,13.146,34.854,13.05,48.118-0.213l17.063-17.063c6.448-6.449,10.052-15.208,10.009-24.328 c-0.043-9.119-3.729-17.844-10.238-24.23L248.59,55.104z"></path> <path d="M239.068,430.415c25.035,24.254,59.492,36.527,94.342,33.861c29.775-2.259,57.676-15.697,78.605-36.957 c4.062-4.127,12.247-12.312,16.374-16.375c21.259-20.931,34.699-48.829,36.958-78.604c2.665-34.852-9.609-69.309-33.861-94.342 l-55.331-56.386c-6.389-6.509-15.111-10.195-24.231-10.238c-9.119-0.044-17.878,3.561-24.326,10.009l-17.063,17.063 c-13.263,13.263-13.358,34.737-0.213,48.117l54.776,55.756c10.853,11.178,10.459,30.734-0.638,41.674 c-4.884,4.814-14.583,14.514-19.396,19.396c-10.938,11.096-30.497,11.49-41.675,0.637l-55.752-54.775 c-13.381-13.146-34.854-13.051-48.118,0.212l-17.063,17.063c-6.448,6.447-10.053,15.207-10.01,24.326 c0.043,9.119,3.729,17.844,10.238,24.23L239.068,430.415z"></path> </g> <path d="M327.129,105.221c8.647,0,15.663-7.016,15.663-15.669v-73.13c0-8.647-7.016-15.663-15.663-15.663 c-8.646,0-15.652,7.016-15.652,15.663v73.13C311.477,98.205,318.481,105.221,327.129,105.221z"></path> <path d="M466.653,146.088h-73.13c-8.647,0-15.686,6.995-15.686,15.652c0,8.664,7.037,15.653,15.686,15.653h73.13 c8.637,0,15.662-6.989,15.662-15.653C482.315,153.083,475.29,146.088,466.653,146.088z"></path> <path d="M344.039,141.942c4.084,4.074,9.416,6.116,14.769,6.116c5.354,0,10.695-2.042,14.78-6.116l104.811-104.81 c8.17-8.159,8.17-21.391,0-29.55c-8.159-8.153-21.381-8.153-29.561,0L344.039,112.398 C335.87,120.551,335.87,133.782,344.039,141.942z"></path> <path d="M157.358,379.306c-8.667,0-15.663,7.016-15.663,15.663v73.13c0,8.652,6.996,15.667,15.663,15.667 c8.647,0,15.633-7.015,15.633-15.667v-73.13C172.991,386.322,166.006,379.306,157.358,379.306z"></path> <path d="M17.887,338.744h73.13c8.647,0,15.674-6.998,15.674-15.656c0-8.653-7.026-15.653-15.674-15.653h-73.13 c-8.658,0-15.664,7-15.664,15.653C2.223,331.746,9.229,338.744,17.887,338.744z"></path> <path d="M140.49,342.585c-8.169-8.159-21.39-8.159-29.56,0L6.111,447.399c-8.148,8.155-8.148,21.392,0,29.544 c4.094,4.08,9.438,6.111,14.789,6.111c5.354,0,10.695-2.031,14.77-6.111l104.82-104.813 C148.639,363.975,148.639,350.744,140.49,342.585z"></path> </g> </g></svg>
                        <h1 class="text-lg font-bold text-slate-500">Url.bit</h1>
                    </a>

                </div>

                {{-- @auth
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
                @endauth --}}

            </div>

            @guest
            <div class="flex gap-4 justify-center items-center">
                <a href="/users/login" class="border border-cyan-500 text-slate-400  px-3 py-1 rounded-lg transition duration-100 hover:bg-cyan-500/10 hover:text-white">Login</a>
                <a href="/users/register" class="bg-cyan-500 text-white px-3 py-1 rounded-lg transition duration-100 hover:bg-cyan-600">Sign up</a>
            </div>
            @endguest

            @auth
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
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

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            @endauth

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    @auth
    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
    @endauth


</nav>
