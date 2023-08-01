<!-- Profile menu -->
<li class="relative">
    <button
        class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none"
        @click="toggleProfileMenu"
        @keydown.escape="closeProfileMenu"
        aria-label="Account"
        aria-haspopup="true"
    >
        <img
            class="object-cover w-8 h-8 rounded-full"
            src="/assets/img/user.jpeg"
            alt=""
            aria-hidden="true"
        />
    </button>
    <template x-if="isProfileMenuOpen">
        <ul
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click.away="closeProfileMenu"
            @keydown.escape="closeProfileMenu"
            class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700"
            aria-label="submenu"
        >
            <li class="flex">
                <x-forms.form :action="route('logout') " method="POST">
                    <button
                        class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                        href="#"
                    >
                        <svg
                            class="w-4 h-4 mr-3"
                            aria-hidden="true"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
                            ></path>
                        </svg>
                        <span>{{ __('Log out') }}</span>
                    </button>
                </x-forms.form>
            </li>
        </ul>
    </template>
</li>
