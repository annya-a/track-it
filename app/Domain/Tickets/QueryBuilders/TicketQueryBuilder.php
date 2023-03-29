<?php

namespace App\Domain\Tickets\QueryBuilders;

use App\Domain\Tickets\Enums\TicketStatus;
use Illuminate\Database\Eloquent\Builder;

class TicketQueryBuilder extends Builder
{
    public function resolvedLast(): self
    {
        return $this->orderByRaw(
            'case when status = ? then 1
            else 0
            end', TicketStatus::RESOLVED->name);
    }
}
