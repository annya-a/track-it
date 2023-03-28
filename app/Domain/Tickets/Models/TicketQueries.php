<?php

namespace App\Domain\Tickets\Models;

use App\Domain\Tickets\Enums\TicketStatus;
use Illuminate\Database\Eloquent\Builder;

trait TicketQueries
{
    public function scopeResolvedLast(Builder $query)
    {
        $query->orderByRaw(
            'case when status = ? then 1
            else 0
            end', TicketStatus::RESOLVED->name);
    }
}
