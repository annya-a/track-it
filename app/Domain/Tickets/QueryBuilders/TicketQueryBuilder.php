<?php

namespace App\Domain\Tickets\QueryBuilders;

use App\Domain\Tickets\Enums\TicketStatus;
use Illuminate\Database\Eloquent\Builder;

class TicketQueryBuilder extends Builder implements BuilderInterface
{
    public function resolvedLast(): static
    {
        return $this->orderByRaw(
            'case when status = ? then 1
            else 0
            end', TicketStatus::resolved());
    }

    public function filterByProject(int $projectId): static
    {
        return $this->where('project_id', $projectId);
    }
}
