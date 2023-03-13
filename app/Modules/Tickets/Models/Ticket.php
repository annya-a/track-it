<?php

namespace App\Modules\Tickets\Models;

use App\Modules\Projects\Models\Project;
use App\Modules\Tickets\Database\Factories\TicketFactory;
use App\Modules\Tickets\Enums\TicketStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => TicketStatus::class
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    protected static function newFactory()
    {
        return TicketFactory::new();
    }
}
