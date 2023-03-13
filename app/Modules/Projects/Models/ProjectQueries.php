<?php

namespace App\Modules\Projects\Models;

use App\Modules\Projects\Enums\ProjectStatus;
use Illuminate\Database\Eloquent\Builder;

trait ProjectQueries
{
    public function scopeOpenFirst(Builder $query)
    {
        $query->orderByRaw(
            'case when status = ? then 0
            when status = ? then 1
            end', [ProjectStatus::OPEN->name, ProjectStatus::CLOSED->name]);
    }
}
