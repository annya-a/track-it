<?php

namespace App\Web\TimeTracking\Controllers;

use App\Http\Controllers\Controller;
use App\Web\TimeTracking\Requests\TimeTrackingRequest;
use Domain\Tickets\Actions\GetTicketAction;
use Domain\Tickets\DataTransferObjects\TicketFindData;
use Domain\TimeTracking\Actions\CreateTimeTrackingAction;
use Domain\TimeTracking\DataTransferObjects\TimeTrackingData;
use Illuminate\Support\Carbon;

class TimeTrackingCreateController extends Controller
{
    protected CreateTimeTrackingAction $create_action;

    protected GetTicketAction $get_ticket_action;

    public function __construct(CreateTimeTrackingAction $createAction, GetTicketAction $getTicketAction)
    {
        $this->create_action = $createAction;
        $this->get_ticket_action = $getTicketAction;
    }

    /**
     * Create ticket page.
     *
     * @param int $ticket
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create(int $ticket)
    {
        $ticketFindData = TicketFindData::from([
            'id' => $ticket
        ]);

        $ticket = $this->get_ticket_action->execute($ticketFindData);

        return view('time_tracking.create', [
            'ticket' => $ticket,
            'pageTitle' => __('Log time for ticket :name', ['name' => $ticket->title]),
        ]);
    }

    /**
     * Store time tracking.
     *
     * @param TimeTrackingRequest $request
     * @param int $ticket
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TimeTrackingRequest $request, int $ticket)
    {
        $data = TimeTrackingData::from([
            'started_at' => Carbon::parse($request->started_at),
            'ended_at' => Carbon::parse($request->ended_at),
            'ticket_id' => $ticket,
            'creator_id' => $request->user()->id,
            'description' => $request->description,
        ]);

        $this->create_action->execute($data);

        return redirect()->route('tickets.index');
    }
}
