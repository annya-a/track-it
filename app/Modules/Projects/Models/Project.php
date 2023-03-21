<?php

namespace App\Modules\Projects\Models;

use App\Modules\Projects\Database\Factories\ProjectFactory;
use App\Modules\Projects\Enums\ProjectStatus;
use App\Modules\Tickets\Models\Ticket;
use App\Modules\Users\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory, ProjectQueries;

    protected $casts = [
        'status' => ProjectStatus::class,
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::addGlobalScope(new OwnerScope);
    }

    protected static function newFactory()
    {
        return new ProjectFactory();
    }
}
