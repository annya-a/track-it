<?php

namespace App\Modules\Tickets\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class ProjectOwnerScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        if (auth()->hasUser()) {
            $builder->whereHas('project', function (Builder $query) {
                $query->where('owner_id', auth()->user()->id);
            });
        }
    }
}
