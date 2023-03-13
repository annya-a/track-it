@php
    /**
     * @var \Illuminate\Contracts\Pagination\LengthAwarePaginator $tickets
     */
@endphp

<x-layout>
    <table class="w-full whitespace-no-wrap">
        <thead>
        <tr
            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
        >
            <th class="px-4 py-3">Title</th>
            <th class="px-4 py-3">Project</th>
            <th class="px-4 py-3">Updated</th>
        </tr>
        </thead>
        <tbody
            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
        >
        @foreach($tickets as $ticket)
            <tr class="text-gray-700 dark:text-gray-400">
                <td class="px-4 py-3">
                    {{ $ticket->title }}
                </td>
                <td class="px-4 py-3">
                    {{ $ticket->project->title }}
                </td>
                <td class="px-4 py-3">
                    {{ $ticket->updated_at->diffForHumans() }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $tickets->onEachSide(1)->links() }}
</x-layout>
