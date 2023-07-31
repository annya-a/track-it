<x-layout.basic :pageTitle="__('Create Company')">
    <x-forms.form :action="route('companies.create')" method="POST">
        <x-forms.text name="name" :value="old('name')" :title="__('Name')"/>

        <x-forms.button name="create">Create</x-forms.button>
    </x-forms.form>
</x-layout.basic>
