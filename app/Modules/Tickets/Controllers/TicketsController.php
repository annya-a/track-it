<?php

namespace App\Modules\Tickets\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Tickets\Models\Ticket;

class TicketsController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with('project')
            ->orderBy('updated_at', 'desc')
            ->paginate();

        return view('tickets.index', compact('tickets'));
    }
}
