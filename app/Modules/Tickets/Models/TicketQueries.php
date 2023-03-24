<?php

namespace App\Modules\Tickets\Models;

use App\Modules\Tickets\Enums\TicketStatus;
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
