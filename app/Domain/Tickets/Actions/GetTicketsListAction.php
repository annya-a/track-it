<?php

namespace App\Domain\Tickets\Actions;

use App\Domain\Tickets\DataTransferObjects\TicketsListFetchData;
use App\Domain\Tickets\Models\Ticket;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Scout\Builder as ScoutBuilder;

class GetTicketsListAction
{
    /**
     * Get list of tickets by parameters.
     *
     * @param TicketsListFetchData $data
     * @return mixed
     */
    public function execute(TicketsListFetchData $data)
    {
        $query = $this->queryBuilder($data->search);

        return $query
            ->when($data->project_id, function ($query) use ($data) {
                $query->filterByProject($data->project_id);
            })
            ->resolvedLast()
            ->orderBy('updated_at', 'desc')
            ->paginate()
            ->appends('query', null)
            ->withQueryString()
            ->onEachSide(1);
    }

    /**
     * Get query builder.
     *
     * @param $search
     * @return Builder|ScoutBuilder
     */
    private function queryBuilder($search): Builder|ScoutBuilder
    {
        return $search
            ? Ticket::search($search)
            : Ticket::query();
    }
}
