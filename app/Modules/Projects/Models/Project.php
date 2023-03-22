<?php

namespace App\Modules\Projects\Models;

use App\Modules\Companies\Models\Company;
use App\Modules\Projects\Database\Factories\ProjectFactory;
use App\Modules\Projects\Enums\ProjectStatus;
use App\Modules\Tickets\Models\ProjectCompanyScope;
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
}
