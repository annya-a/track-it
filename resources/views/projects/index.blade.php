@php
    /**
     * @var \Illuminate\Contracts\Pagination\LengthAwarePaginator $projects
     */
@endphp

<x-layout.app>
    <table class="w-full whitespace-no-wrap">
        <thead>
        <tr
            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
        >
            <th class="px-4 py-3">Title</th>
            <th class="px-4 py-3">Status</th>
            <th class="px-4 py-3">Updated</th>
        </tr>
        </thead>
        <tbody
            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
        >
        @foreach($projects as $project)
            <tr class="text-gray-700 dark:text-gray-400">
                <td class="px-4 py-3 text-sm">
                    {{ $project->title }}
                </td>
                <td class="px-4 py-3 text-xs">
                    <x-projects.status :status="$project->status" />
                </td>
                <td class="px-4 py-3 text-sm">
                    {{ $project->updated_at->diffForHumans() }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $projects->onEachSide(1)->links() }}
</x-layout.app>
