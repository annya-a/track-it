<div class="py-4 text-gray-500 dark:text-gray-400">
    <a
        class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200"
        href="/"
    >
        Track it!
    </a>
    <ul class="mt-6">
        <li class="relative px-6 py-3">
            @if (request()->routeIs('dashboard'))
                <x-navigation.partials.active/>
            @endif

            <a
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="/"
            >
                <svg
                    class="w-5 h-5"
                    aria-hidden="true"
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                    ></path>
                </svg>
                <span class="ml-4">{{ __('Dashboard')}}</span>
            </a>
        </li>
    </ul>
    <ul>
        <li class="relative px-6 py-3">
            @if (request()->routeIs('projects.index'))
                <x-navigation.partials.active/>
            @endif

            <a
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="route('projects.index')"
            >
                <svg
                    class="w-5 h-5"
                    aria-hidden="true"
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
                    ></path>
                </svg>
                <span class="ml-4">{{ __('Projects') }} </span>
            </a>
        </li>
        <li class="relative px-6 py-3">
            @if (request()->routeIs('tickets.index'))
                <x-navigation.partials.active/>
            @endif

            <a
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="route('tickets.index')"
            >
                <svg
                    class="w-5 h-5"
                    aria-hidden="true"
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                </svg>
                <span class="ml-4">{{ __('Tickets')}}</span>
            </a>
        </li>
    </ul>
</div>
