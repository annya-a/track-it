@php
    /**
     * @var \Illuminate\Contracts\Pagination\LengthAwarePaginator $tickets
     */
@endphp

<x-layout>
    <table>
        <thead>
        <th>
            Title
        </th>
        <th>
           Updated
        </th>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->title }}</td>
                    <td> {{ $ticket->updated_at->diffForHumans() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $tickets->links() }}
</x-layout>
