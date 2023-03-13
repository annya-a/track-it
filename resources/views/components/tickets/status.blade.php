@php
    use App\Modules\Tickets\Enums\TicketStatus;

    /**
     * @var TicketStatus $status
     */
@endphp

@if ($status === TicketStatus::NEW)
    <span
        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
    >{{ $status->label() }}
    </span>
@elseif($status === TicketStatus::ASSIGNED)
    <span
        class="px-2 py-1 font-semibold leading-tight text-teal-500 bg-teal-100 rounded-full dark:bg-teal-500 dark:text-teal-100"
    >{{ $status->label() }}
    </span>
@elseif($status === TicketStatus::IN_PROGRESS)
    <span
        class="px-2 py-1 font-semibold leading-tight text-blue-500 bg-blue-100 rounded-full dark:bg-blue-500 dark:text-blue-100"
    >{{ $status->label() }}
    </span>
@elseif($status === TicketStatus::PENDING)
    <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
        {{ $status->label() }}
    </span>
@elseif($status === TicketStatus::RESOLVED)
    <span class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:text-gray-100 dark:bg-gray-700">
       {{ $status->label() }}
    </span>
@endif
