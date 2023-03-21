<?php

namespace App\Modules\Tickets\Models;

use App\Modules\Projects\Models\Project;
use App\Modules\Tickets\Database\Factories\TicketFactory;
use App\Modules\Tickets\Enums\TicketStatus;
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

    function toSearchableArray()
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
        static::addGlobalScope(new ProjectOwnerScope);
    }

    protected static function newFactory()
    {
        return TicketFactory::new();
    }
}
