<?php

namespace App\Domain\Tickets\Models;

use App\Domain\Projects\DataTransferObjects\ProjectData;
use App\Domain\Projects\Models\Project;
use App\Domain\Tickets\Database\Factories\TicketFactory;
use App\Domain\Tickets\Enums\TicketStatus;
use App\Domain\Tickets\QueryBuilders\ProjectCompanyScope;
use App\Domain\Tickets\QueryBuilders\TicketQueryBuilder;
use App\Domain\Tickets\QueryBuilders\TicketScoutQueryBuilder;
use App\Domain\Users\DataTransferObjects\UserData;
use App\Domain\Users\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Ticket extends Model
{
    use HasFactory, Searchable;

    protected $casts = [
        'status' => TicketStatus::class,
        'project' => ProjectData::class,
        'creator' => UserData::class,
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

    public function newEloquentBuilder($query)
    {
        return new TicketQueryBuilder($query);
    }

    /**
     * Perform a search against the model's indexed data.
     *
     * @param  string  $query
     * @param  \Closure  $callback
     * @return \Laravel\Scout\Builder
     */
    public static function search($query = '', $callback = null)
    {
        return app(TicketScoutQueryBuilder::class, [
            'model' => new static,
            'query' => $query,
            'callback' => $callback,
            'softDelete'=> static::usesSoftDelete() && config('scout.soft_delete', false),
        ]);
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
}
