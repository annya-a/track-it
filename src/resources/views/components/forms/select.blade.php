@props([
    'title',
    'name',
    'options',
    'value' => null,
])


<label for="{{ $name }}">{{ $title }}</label>

<select name="{{ $name }}">
    @foreach($options as $option => $title)
        <option
            value="{{ $option }}"
            @if ($value == $option)
                selected
            @endif
        >{{ $title }}</option>
    @endforeach
</select>
