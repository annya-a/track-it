<?php

namespace App\Domain\Tickets\QueryBuilders;

use Laravel\Scout\Builder;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

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
