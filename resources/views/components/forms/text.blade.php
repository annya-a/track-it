@props([
    'name',
    'title',
    'placeholder',
    'value' => '',
])

<div>
    <label for="{{ $name }}">{{ $title }}</label>
    <input type="text" name="{{ $name }}"
           @isset($placeholder) placeholder="{{ $placeholder }}" @endisset
           value="{{ $value }}"
        >
    <x-forms.errors :messages="$errors->get($name)"></x-forms.errors>
</div>
