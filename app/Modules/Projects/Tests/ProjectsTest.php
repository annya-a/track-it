<?php

namespace App\Modules\Projects\Tests;

use App\Modules\Companies\Models\Company;
use App\Modules\Projects\Models\Project;
use App\Modules\Users\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * @group projects
 */
class ProjectsTest extends TestCase
{
    use RefreshDatabase;

    public function test_project_should_be_in_database_after_creation(): void
    {
        $project = Project::factory()
            ->create();

        $this->assertModelExists($project);
    }

    public function test_when_guest_requests_projects_page_he_is_redirected_to_login_page(): void
    {
        $response = $this->get('/projects');
        $response->assertRedirect('login');
    }

    public function test_project_is_visible_on_projects_page(): void
    {
        $company = Company::factory()->create();
        $user = User::factory()
            ->for($company)
            ->create();

        $project = Project::factory()
            ->for($company)
            ->create();

        $response = $this->actingAs($user)->get('/projects');
        $response->assertStatus(200);
        $response->assertSee($project->title);
    }

    public function test_pager_is_visible_on_projects_page(): void
    {
        $company = Company::factory()->create();
        $user = User::factory()
            ->for($company)
            ->create();

        Project::factory()
            ->for($company)
            ->count(16)
            ->create();

        $response = $this->actingAs($user)->get('/projects');
        $response->assertStatus(200);
        $response->assertSee('Next');
    }


    public function test_pager_is_not_visible_on_projects_page(): void
    {
        $company = Company::factory()->create();
        $user = User::factory()
            ->for($company)
            ->create();

        Project::factory()
            ->for($company)
            ->count(15)
            ->create();

        $response = $this->actingAs($user)->get('/');
        $response->assertStatus(200);
        $response->assertDontSee('Next');
    }
}

