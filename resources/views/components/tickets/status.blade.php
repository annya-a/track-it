@php
    use App\Domain\Tickets\Enums\TicketStatus;

    /**
     * @var TicketStatus $status
     */

    $class = match ($status) {
        TicketStatus::new() => 'text-green-700 bg-green-100 dark:bg-green-700 dark:text-green-100',
        TicketStatus::assigned() => 'text-blue-500 bg-blue-100 dark:bg-blue-5 dark:text-gray-700',
        TicketStatus::in_progress() => 'text-teal-500 bg-teal-100 dark:bg-teal-500 dark:text-teal-100',
        TicketStatus::pending() => 'text-orange-700 bg-orange-100 dark:text-white dark:bg-orange-600',
        TicketStatus::resolved() => 'text-gray-700 bg-gray-100 rounded-full dark:text-gray-100 dark:bg-gray-700',
    }
@endphp

<span class="px-2 py-1 font-semibold leading-tight rounded-full {{ $class }}">
    {{ $status->label }}
</span>
