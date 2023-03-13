<?php

namespace App\Modules\Projects\Models;

use App\Modules\Projects\Database\Factories\ProjectFactory;
use App\Modules\Tickets\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    protected static function newFactory()
    {
        return new ProjectFactory();
    }
}
