<?php

namespace Domain\TimeTracking\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class ProjectCompanyScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        if (auth()->hasUser()) {
            $builder->whereHas('ticket', function (Builder $query) {
                $query->whereHas('project', function (Builder $query) {
                    $query->where('company_id', auth()->user()->company_id);
                });
            });
        }
    }
}
