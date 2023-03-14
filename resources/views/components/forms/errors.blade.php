@props(['messages'])

@if ($messages)
    @foreach ((array) $messages as $message)
        <span class="text-xs text-red-600 dark:text-red-400">
            {{ $message }}
        </span>
    @endforeach
@endif
