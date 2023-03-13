@props([
    'routeName',
    'title'
])

<li class="relative px-6 py-3">
    @if (request()->routeIs($routeName))
        <x-navigation.partials.active/>
    @endif
    <a
        class="@if (request()->routeIs($routeName)) text-gray-800 @endif
        inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
        href="{{ route($routeName) }}"
    >
        {{ $slot }}
        <span class="ml-4">{{ $title }}</span>
    </a>
</li>
