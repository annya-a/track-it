<?php

namespace App\Domain\Tickets\QueryBuilders;

use App\Domain\Tickets\Enums\TicketStatus;

interface BuilderInterface
{
    public function resolvedLast();

    public function filterByProject(int $projectId);
}
