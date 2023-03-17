<?php

namespace App\Modules\Tickets\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Tickets\Models\Ticket;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    public function index(Request $request)
    {
        $tickets = $request->search
            ? Ticket::search($request->search)
            : Ticket::query();

        $tickets = $tickets->orderBy('updated_at', 'desc')
            ->paginate()
            ->appends('query', null)
            ->withQueryString()
            ->onEachSide(1);

        $tickets->load('project');

        return view('tickets.index', compact('tickets'));
    }
}
