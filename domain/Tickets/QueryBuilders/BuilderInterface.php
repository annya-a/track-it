<?php

namespace Domain\Tickets\QueryBuilders;

interface BuilderInterface
{
    public function resolvedLast();

    public function filterByProject(int $projectId);
}
