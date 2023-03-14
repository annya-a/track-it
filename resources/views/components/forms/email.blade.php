@props([
    'name',
    'title',
    'placeholder',
    'value'
])

<label class="block text-sm" for="{{ $name }}">{{ $title }}</label>
<input type="email" name="{{ $name }}"
       @isset($placeholder) placeholder="{{ $placeholder }}" @endisset
       value="{{ $value }}"
       class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input
       @if ($errors->get($name)) border-red-600 focus:border-red-400 focus:shadow-outline-red @endif
       "
>
<x-forms.errors :messages="$errors->get($name)"></x-forms.errors>
