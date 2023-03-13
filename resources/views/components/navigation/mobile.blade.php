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
                <span class="ml-4">Dashboard</span>
            </a>
        </li>
    </ul>
    <ul>
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
                <span class="ml-4">Tickets</span>
            </a>
        </li>
    </ul>
</div>
