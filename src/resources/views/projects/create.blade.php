@props([
    'pageTitle'
])

<x-layout.basic :pageTitle="$pageTitle">
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <x-forms.form :action="route('projects.create')" method="POST">
            <x-forms.text name="name" :value="old('name')" :title="__('Create')"/>

            <x-forms.button name="create" class="w-auto">{{ __('Create') }}</x-forms.button>
        </x-forms.form>
    </div>
</x-layout.basic>
