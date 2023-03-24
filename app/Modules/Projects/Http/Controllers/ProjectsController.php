<?php

namespace App\Modules\Projects\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Projects\Enums\ProjectStatus;
use App\Modules\Projects\Models\Project;

class ProjectsController extends Controller
{
    /**
     * List of projects.
     */
    public function index()
    {
        $projects = Project::openFirst()
            ->latest('updated_at')
            ->paginate();

        return view('projects.index', compact('projects'));
    }
}
