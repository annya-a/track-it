@php
    use App\Domain\Companies\Models\Company;
    use App\Domain\Projects\Models\Project;
    use App\Domain\Tickets\Models\Ticket;
@endphp

<ul class="mt-6">
    <x-navigation.partials.link routeName="dashboard" title="Dashboard">
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
    </x-navigation.partials.link>
</ul>
<ul>
    <x-navigation.partials.link routeName="projects.index" title="Projects">
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
    </x-navigation.partials.link>

    <x-navigation.partials.link routeName="tickets.index" title="Tickets">
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
    </x-navigation.partials.link>
</ul>

@can('create', Company::class)
    <div class="px-6 my-6">
        <a href="{{ route('companies.create') }}"
           class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
        >
            Create company
            <span class="ml-2" aria-hidden="true">+</span>
        </a>
    </div>
@endcan

@if (request()->user()->can('create', Ticket::class) && request()->route()->hasParameter('project'))
    <div class="px-6 my-6">
        <a href="{{ route('tickets.create', request()->route()->parameter('project')) }}"
           class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
        >
            Create ticket
            <span class="ml-2" aria-hidden="true">+</span>
        </a>
    </div>
@endif

@can('create', Project::class)
    <div class="px-6 my-6">
        <a href="{{ route('projects.create') }}"
           class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
        >
            Create project
            <span class="ml-2" aria-hidden="true">+</span>
        </a>
    </div>
@endcan
