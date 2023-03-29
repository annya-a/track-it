<?php

namespace App\Domain\Projects\Models;

use App\Domain\Companies\Models\Company;
use App\Domain\Projects\Database\Factories\ProjectFactory;
use App\Domain\Projects\Enums\ProjectStatus;
use App\Domain\Projects\QueryBuilders\CompanyScope;
use App\Domain\Projects\QueryBuilders\ProjectQueryBuilder;
use App\Domain\Tickets\Models\Ticket;
use App\Domain\Users\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => ProjectStatus::class,
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::addGlobalScope(new CompanyScope);
    }

    protected static function newFactory()
    {
        return new ProjectFactory();
    }

    public function newEloquentBuilder($query)
    {
        return new ProjectQueryBuilder($query);
    }
}
