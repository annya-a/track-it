<?php

namespace Domain\TimeTracking\Actions;

use Domain\TimeTracking\Models\TimeTracking;
use Domain\TimeTracking\DataTransferObjects\TimeTrackingData;

class CreateTimeTrackingAction
{
    public function execute(TimeTrackingData $data): TimeTrackingData
    {
        $timeTracking = new TimeTracking();
        $timeTracking->started_at = $data->started_at;
        $timeTracking->ended_at = $data->ended_at;
        $timeTracking->creator_id = $data->creator_id;
        $timeTracking->ticket_id = $data->ticket_id;
        $timeTracking->description = $data->description;
        $timeTracking->save();

        return TimeTrackingData::from($timeTracking);
    }
}
