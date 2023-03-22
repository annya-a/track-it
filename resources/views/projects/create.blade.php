<x-layout.basic pageTitle="Create Project">
    <x-forms.form :action="route('projects.create')" method="POST">
        <x-forms.text name="name" :value="old('name')" title="Name"/>

        <x-forms.button name="create">Create</x-forms.button>
    </x-forms.form>
</x-layout.basic>
