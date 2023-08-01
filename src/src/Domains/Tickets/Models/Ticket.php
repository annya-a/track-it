<?php

namespace Domain\Tickets\Models;

use Astrotomic\Translatable\Translatable;
use Domain\Projects\DataTransferObjects\ProjectData;
use Domain\Projects\Models\Project;
use Domain\Tickets\Database\Factories\TicketFactory;
use Domain\Tickets\Enums\TicketStatus;
use Domain\Tickets\QueryBuilders\ProjectCompanyScope;
use Domain\Tickets\QueryBuilders\TicketQueryBuilder;
use Domain\Tickets\QueryBuilders\TicketScoutQueryBuilder;
use Domain\Users\DataTransferObjects\UserData;
use Domain\Users\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Ticket extends Model
{
    use HasFactory, Searchable, Translatable;

    public array $translatedAttributes = ['title'];

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

    public function company()
    {
        return $this->project()->getRelation('company');
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
