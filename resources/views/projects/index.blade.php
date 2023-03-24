@php
    /**
     * @var \Illuminate\Contracts\Pagination\LengthAwarePaginator $projects
     */
@endphp

<x-layout.basic>
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                >
                    <th class="px-4 py-3">Name</th>
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
                            <a href="{{ route('projects.show', $project) }}"
                               class="font-medium text-purple-600 dark:text-purple-400 hover:underline"
                            >{{ $project->name }}</a>
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
        </div>
    </div>
</x-layout.basic>
