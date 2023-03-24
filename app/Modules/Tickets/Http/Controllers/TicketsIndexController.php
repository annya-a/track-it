<?php

namespace App\Modules\Tickets\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Projects\Models\Project;
use App\Modules\Tickets\Models\Ticket;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class TicketsIndexController extends Controller
{
    public function index(Request $request, ?Project $project)
    {
        $tickets = $request->search
        ? Ticket::search($request->search)
        : Ticket::query();


        $tickets = $tickets->when($project->id, function (Builder $query) use ($project) {
            $query->where('project_id', $project->id);
        })
            ->resolvedLast()
            ->orderBy('updated_at', 'desc')
            ->paginate()
            ->appends('query', null)
            ->withQueryString()
            ->onEachSide(1);

        $tickets->load('project');

        return view('tickets.index', [
            'tickets' => $tickets,
            'pageTitle' => $this->pageTitle($project)
        ]);
    }

    private function pageTitle(?Project $project)
    {
        return $project->id ? $project->name : 'Tickets';
    }
}
