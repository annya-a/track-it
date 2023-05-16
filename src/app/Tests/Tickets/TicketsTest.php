<?php

namespace App\Tests\Tickets;

use Domain\Companies\Models\Company;
use Domain\Projects\Models\Project;
use Domain\Tickets\Models\Ticket;
use Domain\Users\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @group tickets
 */
class TicketsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Ticket is in database after creation.
     */
    public function test_ticket_is_in_database_after_creation(): void
    {
        $ticket = Ticket::factory()
            ->for(Project::factory())
            ->create();

        $this->assertModelExists($ticket);
    }

    /**
     * When guest request tickets page he is redirected to login page.
     */
    public function test_when_guest_requests_tickets_page_he_is_redirected_to_login_page(): void
    {
        $response = $this->get('/tickets');
        $response->assertRedirect('login');
    }

    /**
     * Ticket is visible on tickets page.
     */
    public function test_ticket_is_visible_on_tickets_page(): void
    {
        $company = Company::factory()->create();
        $user = User::factory()
            ->for($company)
            ->create();

        $ticket = Ticket::factory()
            ->for(Project::factory()
                ->for($user, 'creator')
                ->for($company)
            )
            ->create();

        $response = $this->actingAs($user)->get('/tickets');
        $response->assertOk();
        $response->assertSee($ticket->title);
    }

    /**
     * Pager is visible on tickets page.
     */
    public function test_pager_is_visible_on_tickets_page(): void
    {

        $company = Company::factory()->create();
        $user = User::factory()
            ->for($company)
            ->create();

        Ticket::factory()
            ->count(16)
            ->for(Project::factory()
                ->for($user, 'creator')
                ->for($company)
            )
            ->create();

        $response = $this->actingAs($user)->get('/tickets');
        $response->assertOk();
        $response->assertSee('Next');
    }

    /**
     * Pager is not visible on tickets page.
     */
    public function test_pager_is_not_visible_on_tickets_page(): void
    {
        $company = Company::factory()->create();
        $user = User::factory()
            ->for($company)
            ->create();

        Ticket::factory()
            ->count(15)
            ->for(Project::factory()
                ->for($user, 'creator')
                ->for($company)
            )
            ->create();

        $response = $this->actingAs($user)->get('/tickets');
        $response->assertOk();
        $response->assertDontSee('Next');
    }

    /**
     * Check if Create ticket link is visible.
     */
    public function test_check_if_create_ticket_link_is_visible()
    {
        $company = Company::factory()->create();
        $user = User::factory()
            ->for($company)
            ->create();

        $project = Project::factory()
            ->for($user, 'creator')
            ->for($company)
            ->create();

        $response = $this->actingAs($user)->get("/projects/{$project->id}");
        $response->assertSeeText('Create ticket');
    }

    /**
     * Check if Create ticket link is invisible on projects.index page
     */
    public function test_check_if_create_ticket_link_is_invisible_on_project_index_page()
    {
        $company = Company::factory()->create();
        $user = User::factory()
            ->for($company)
            ->create();

        $response = $this->actingAs($user)->get("/projects");
        $response->assertDontSeeText('Create ticket');
    }

    /**
     * User has no access to create ticket if user is located on not his company project page.
     */
    public function test_user_has_no_access_to_create_ticket_if_user_is_located_on_not_his_company_project_page()
    {
        $company = Company::factory()->create();
        $user = User::factory()
            ->for($company)
            ->create();

        $project = Project::factory()
            ->for(Company::factory())
            ->create();

        $response = $this->actingAs($user)->get("/projects/{$project}/tickets/create");
        $response->assertForbidden();

        $response = $this->actingAs($user)->post("/projects/{$project}/tickets/create");
        $response->assertForbidden();
    }

    /**
     * User has access to create ticket if user is located on his company project page.
     */
    public function test_user_has_access_to_create_ticket_if_user_is_located_on_his_company_project_page()
    {
        $company = Company::factory()->create();
        $user = User::factory()
            ->for($company)
            ->create();

        $project = Project::factory()
            ->for($user, 'creator')
            ->for($company)
            ->create();

        $response = $this->actingAs($user)->get("/projects/{$project->id}/tickets/create");
        $response->assertOk();
    }

    /**
     * User enters wrong data on tickets form and receives errors.
     */
    public function test_user_enters_wrong_data_on_tickets_form_and_receives_errors()
    {
        $company = Company::factory()->create();
        $user = User::factory()
            ->for($company)
            ->create();

        $project = Project::factory()
            ->for($user, 'creator')
            ->for($company)
            ->create();


        $response = $this->actingAs($user)
            ->post("/projects/{$project->id}/tickets/create", ['title' => '']);
        $response->assertSessionHasErrors(['title']);
    }

    /**
     * User creates ticket.
     */
    public function test_user_creates_ticket()
    {
        $company = Company::factory()->create();
        $user = User::factory()
            ->for($company)
            ->create();

        $project = Project::factory()
            ->for($user, 'creator')
            ->for($company)
            ->create();

        $this->assertDatabaseMissing('tickets', ['creator_id' => $user->id]);

        $response = $this->actingAs($user)
            ->post("/projects/{$project->id}/tickets/create", ['title' => 'My company']);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect("/projects/{$project->id}");

        $this->assertDatabaseHas('tickets', ['creator_id' => $user->id]);
    }
}
