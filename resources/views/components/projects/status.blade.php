@php
    use App\Domain\Projects\Enums\ProjectStatus;

    /**
     * @var ProjectStatus $status
     */

    $class = match ($status) {
        ProjectStatus::OPEN => 'text-green-700 bg-green-100 dark:bg-green-700 dark:text-green-100',
        ProjectStatus::CLOSED => 'text-gray-700 bg-gray-100 dark:text-gray-100 dark:bg-gray-700',
    }
@endphp

<span class="px-2 py-1 font-semibold leading-tight rounded-full {{ $class }}">
    {{ $status->label() }}
</span>
