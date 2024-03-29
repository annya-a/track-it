@props([
    'tickets',
    'pageTitle',
    'searchAction' => route('tickets.index'),
])

@php
    /**
     * @var \Spatie\LaravelData\PaginatedDataCollection $tickets
     */
@endphp

<x-layout.basic :pageTitle="$pageTitle" :searchAction="$searchAction">
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                >
                    <th class="px-4 py-3">{{ __('Title') }}</th>
                    <th class="px-4 py-3">{{ __('Status') }}</th>
                    <th class="px-4 py-3">{{ __('Project') }}</th>
                    <th class="px-4 py-3">{{ __('Updated') }}</th>
                    <th class="px-4 py-3">{{ __('Actions') }}</th>
                </tr>
                </thead>
                <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                >
                @foreach($tickets as $ticket)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3 text-sm">
                            {{ $ticket->title }}
                        </td>
                        <td class="px-4 py-3 text-xs">
                            <x-tickets.status :status="$ticket->status" />
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <a href="{{ route('projects.show', $ticket->project->id) }}"
                               class="font-medium text-purple-600 dark:text-purple-400 hover:underline"
                            >{{ $ticket->project->name }}</a>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{ $ticket->updated_at->diffForHumans() }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <a href="{{ route('time_tracking.create', $ticket->id) }}">
                                {{ __('Log time') }}
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{ $tickets->items()->links() }}
        </div>
    </div>
</x-layout.basic>
