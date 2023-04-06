@php
    /**
     * @var \Domain\Tickets\DataTransferObjects\TicketData $ticket
     */
@endphp

@props([
    'ticket',
    'pageTitle',
])

<x-layout.basic :pageTitle="$pageTitle">
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <x-forms.form :action="route('time_tracking.create', ['ticket' => $ticket->id])" method="POST">
            <x-forms.text name="description" :value="old('description')" title="Description"/>
            <x-forms.datetime-local name="started_at" :value="old('started_at')" title="Started at"/>
            <x-forms.datetime-local name="ended_at" :value="old('ended_at')" title="Ended at"/>
            <x-forms.button name="create" class="w-auto">Create</x-forms.button>
        </x-forms.form>
    </div>
</x-layout.basic>
