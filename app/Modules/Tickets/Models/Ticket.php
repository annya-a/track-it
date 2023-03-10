<?php

namespace App\Modules\Tickets\Models;

use App\Modules\Tickets\Database\Factories\TicketFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return TicketFactory::new();
    }
}
