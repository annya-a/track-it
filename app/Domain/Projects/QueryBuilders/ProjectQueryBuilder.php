<?php

namespace App\Domain\Projects\QueryBuilders;

use App\Domain\Projects\Enums\ProjectStatus;
use Illuminate\Database\Eloquent\Builder;

class ProjectQueryBuilder extends Builder
{
    public function openFirst(): self
    {
        return $this->orderByRaw(
            'case when status = ? then 0
            when status = ? then 1
            end', [ProjectStatus::open(), ProjectStatus::closed()]);
    }
}
