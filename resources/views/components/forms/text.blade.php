@props([
    'name',
    'title',
    'placeholder',
    'value' => '',
])
@isset($title) <label for="{{ $name }}">{{ $title }}</label> @endisset
<input type="text" name="{{ $name }}"
       @isset($placeholder) placeholder="{{ $placeholder }}" @endisset
       value="{{ $value }}"
       class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
    >
<x-forms.errors :messages="$errors->get($name)"></x-forms.errors>
