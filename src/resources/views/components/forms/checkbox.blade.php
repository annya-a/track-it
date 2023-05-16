@props([
    'name',
    'title',
    'placeholder',
    'value' => null,
    'option' => '',
])

<label class="flex items-center dark:text-gray-400 block text-sm">
    <input
        type="checkbox" name="{{ $name }}"
        value="{{ $option }}"
        @if ($value === $option) checked @endif
        class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray
        @if ($errors->get($name)) border-red-600 focus:border-red-400 focus:shadow-outline-red @endif
        "
    />
    <span class="ml-2">
        <label for="{{ $name }}">{{ $title }}</label>
    </span>
</label>
<x-forms.errors :messages="$errors->get($name)"></x-forms.errors>
