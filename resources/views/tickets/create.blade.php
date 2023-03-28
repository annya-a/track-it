@php
    /**
     * @var \App\Domain\Projects\Models\Project $project
     */
@endphp

<x-layout.basic>
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <x-forms.form :action="route('tickets.create', ['project' => $project->id])" method="POST">
            <x-forms.text name="title" :value="old('title')" title="Title"/>
            <x-forms.button name="create" class="w-auto">Create</x-forms.button>
        </x-forms.form>
    </div>
</x-layout.basic>
