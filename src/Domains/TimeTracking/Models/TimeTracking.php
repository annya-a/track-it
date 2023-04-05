<?php

namespace Domain\TimeTracking\Models;

use Domain\Tickets\Models\Ticket;
use Domain\TimeTrack\Database\Factories\TimeTrackingFactory;
use Domain\Users\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TimeTracking extends Model
{
    use HasFactory;

    protected $table = 'time_tracking';

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class);
    }

    protected static function newFactory(): TimeTrackingFactory
    {
        return new TimeTrackingFactory();
    }
}
