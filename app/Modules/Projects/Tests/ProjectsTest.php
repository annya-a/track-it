<?php

namespace App\Modules\Projects\Tests;

use App\Modules\Projects\Models\Project;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectsTest extends TestCase
{
    use RefreshDatabase;

    public function test_project_is_in_database_after_creation(): void
    {
        $project = Project::factory()->create();

        $this->assertModelExists($project);
    }

    public function test_project_is_visible_on_projects_page(): void
    {
        $project = Project::factory()->create();

        $response = $this->get('/projects');
        $response->assertStatus(200);
        $response->assertSee($project->title);
    }

    public function test_pager_is_visible_on_projects_page(): void
    {
        Project::factory()->count(16)->create();

        $response = $this->get('/projects');
        $response->assertSee('Next');
    }


    public function test_pager_is_not_visible_on_projects_page(): void
    {
        Project::factory()->count(15)->create();

        $response = $this->get('/');
        $response->assertDontSee('Next');
    }
}

