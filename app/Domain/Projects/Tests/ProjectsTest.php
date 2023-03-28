<?php

namespace App\Domain\Projects\Tests;

use App\Domain\Companies\Models\Company;
use App\Domain\Projects\Models\Project;
use App\Domain\Tickets\Models\Ticket;
use App\Domain\Users\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * @group projects
 */
class ProjectsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Project should be in database after creation.
     */
    public function test_project_should_be_in_database_after_creation(): void
    {
        $project = Project::factory()
            ->create();

        $this->assertModelExists($project);
    }

    /**
     * When guest requests projects page he is redirected to login page.
     */
    public function test_when_guest_requests_projects_page_he_is_redirected_to_login_page(): void
    {
        $response = $this->get('/projects');
        $response->assertRedirect('login');
    }

    /**
     * If user requests projects/create page and he doesn't belong to any company he should receive unauthorized response.
     */
    public function test_if_user_requests_projects_create_page_and_he_doesnt_belong_to_any_company_he_should_receive_unauthorized_response()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/projects/create');
        $response->assertStatus(403);

        $response = $this->actingAs($user)->post('/projects/create');
        $response->assertStatus(403);
    }

    /**
     * User enters wrong data on project form and receives errors.
     */
    public function test_user_enters_wrong_data_on_company_form_and_receives_errors()
    {
        $user = $this->createUserWithCompany($this->createCompany());

        $response = $this->actingAs($user)
            ->post('/projects/create', ['name' => '']);
        $response->assertSessionHasErrors(['name']);
    }

    /**
     * User creates project successfully.
     */
    public function test_user_creates_company_and_he_is_a_companies_creator()
    {
        $user = $this->createUserWithCompany($this->createCompany());

        $this->assertDatabaseMissing('projects', ['creator_id' => $user->id]);

        $response = $this->actingAs($user)
            ->post('/projects/create', ['name' => 'My project']);
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('projects', ['creator_id' => $user->id, 'name' => 'My project']);
    }

    /**
     * Project is visible on projects page.
     */
    public function test_project_is_visible_on_projects_page(): void
    {
        $company = $this->createCompany();
        $user = $this->createUserWithCompany($company);

        $project = Project::factory()
            ->for($company)
            ->create();

        $response = $this->actingAs($user)->get('/projects');
        $response->assertStatus(200);
        $response->assertSee($project->title);
    }

    /**
     * Pager is visible on projects page.
     */
    public function test_pager_is_visible_on_projects_page(): void
    {
        $company = $this->createCompany();
        $user = $this->createUserWithCompany($company);

        Project::factory()
            ->for($company)
            ->count(16)
            ->create();

        $response = $this->actingAs($user)->get('/projects');
        $response->assertStatus(200);
        $response->assertSee('Next');
    }

    /**
     * Pager is not visible on projects page.
     */
    public function test_pager_is_not_visible_on_projects_page(): void
    {
        $company = $this->createCompany();
        $user = $this->createUserWithCompany($company);

        Project::factory()
            ->for($company)
            ->count(15)
            ->create();

        $response = $this->actingAs($user)->get('/');
        $response->assertStatus(200);
        $response->assertDontSee('Next');
    }

    /**
     * On project page user sees ticket which belongs to project.
     */
    public function test_on_project_page_user_sees_ticket_which_belongs_to_project()
    {
        $company = $this->createCompany();
        $user = $this->createUserWithCompany($company);

        $project = Project::factory()
            ->for($company)
            ->create();

        Ticket::factory(['title' => 'My first ticket'])
            ->for($project)
            ->create();

        $response = $this->actingAs($user)->get("/projects/{$project->id}");
        $response->assertSeeText('My first ticket');
    }

    /**
     * On project page user doesn't see ticket which doesn't belong to project.
     */
    public function test_on_project_page_user_sees_ticket_which_doesnt_belong_to_project()
    {
        $company = $this->createCompany();
        $user = $this->createUserWithCompany($company);

        $project1 = Project::factory()
            ->for($company)
            ->create();

        $project2 = Project::factory()
            ->for($company)
            ->create();

        Ticket::factory(['title' => 'My first ticket'])
            ->for($project2)
            ->create();

        $response = $this->actingAs($user)->get("/projects/{$project1->id}");
        $response->assertDontSeeText('My first ticket');
    }

    /**
     * Create user with company.
     * @param Company $company
     * @return User
     */
    private function createUserWithCompany(Company $company): User
    {
        return User::factory()
            ->for($company)
            ->create();
    }

    /**
     * Create company.
     *
     * @return Company
     */
    private function createCompany(): Company
    {
        return Company::factory()->create();
    }
}

