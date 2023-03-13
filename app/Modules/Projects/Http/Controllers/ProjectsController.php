<?php

namespace App\Modules\Projects\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Projects\Models\Project;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::latest('updated_at')
            ->paginate();

        return view('projects.index', compact('projects'));
    }
}
