<?php

namespace App\App\Web\Controllers;

use App\Domain\Projects\Models\Project;

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
