<?php

namespace App\Modules\Projects\Enums;

enum ProjectStatus
{
    case OPEN;
    case CLOSED;

    public function label(): string
    {
        return match($this) {
            ProjectStatus::OPEN => 'Open',
            ProjectStatus::CLOSED => 'Closed',
        };
    }
}
