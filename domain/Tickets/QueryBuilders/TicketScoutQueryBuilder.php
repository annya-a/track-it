<?php

namespace Domain\Tickets\QueryBuilders;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Laravel\Scout\Builder;

class TicketScoutQueryBuilder extends Builder implements BuilderInterface
{
    public function resolvedLast()
    {
        return $this->query(function (EloquentBuilder $query) {
            $query->resolvedLast();
        });
    }

    public function filterByProject(int $projectId)
    {
        $this->where('project_id', $projectId);
    }
}
