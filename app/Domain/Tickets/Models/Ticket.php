<?php

namespace App\Domain\Tickets\Models;

use App\Domain\Projects\Models\Project;
use App\Domain\Tickets\Database\Factories\TicketFactory;
use App\Domain\Tickets\Enums\TicketStatus;
use App\Domain\Tickets\QueryBuilders\ProjectCompanyScope;
use App\Domain\Tickets\QueryBuilders\TicketQueryBuilder;
use App\Domain\Users\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Ticket extends Model
{
    use HasFactory, Searchable;

    protected $casts = [
        'status' => TicketStatus::class
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
        ];
    }

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::addGlobalScope(new ProjectCompanyScope);
    }

    protected static function newFactory()
    {
        return TicketFactory::new();
    }

    public function newEloquentBuilder($query)
    {
        return new TicketQueryBuilder($query);
    }
}
