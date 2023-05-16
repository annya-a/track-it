@props([
    'action',
    'method' => 'POST'
])
<form action="{{ $action }}" method="{{ $method }}">
    @if ($method !== 'GET')
        @csrf
    @endif

    {{ $slot }}
</form>
