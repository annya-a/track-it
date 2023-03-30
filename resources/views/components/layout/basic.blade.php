@props([
    'pageTitle',
    'slot',
    'searchAction' => route('tickets.index')
])

<x-layout.app>
    <div
        class="flex h-screen bg-gray-50 dark:bg-gray-900"
        :class="{ 'overflow-hidden': isSideMenuOpen}"
    >
        <x-layout.partials.left-sidebar/>
        <div class="flex flex-col flex-1 w-full">
            <x-layout.partials.header :searchAction="$searchAction"/>

            <main class="h-full pb-16 overflow-y-auto">
                <div class="container px-6 mx-auto grid">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        {{ $pageTitle ?? 'Track It!' }}
                    </h2>

                    {{ $slot }}

                </div>
            </main>
        </div>
    </div>
</x-layout.app>
