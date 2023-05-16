<?php

namespace App\Tests\TimeTracking;

use Domain\Companies\Models\Company;
use Domain\Projects\Models\Project;
use Domain\Tickets\Models\Ticket;
use Domain\TimeTracking\Models\TimeTracking;
use Domain\Users\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @group time-tracking
 */
class TimeTrackingTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Time tracking is in database after creation.
     */
    public function test_time_tracking_is_in_database_after_creation(): void
    {
        $timeTracking = TimeTracking::factory()->create();

        $this->assertModelExists($timeTracking);
    }

    /**
     * User has no access to create time tracking if user is located on not his company ticket page.
     */
    public function test_user_has_no_access_to_create_time_tracking_if_user_is_located_on_not_his_ticket_project_page()
    {
        $company = Company::factory()->create();
        $user = User::factory()
            ->for($company)
            ->create();

        $ticket = Ticket::factory()
            ->for(Project::factory()->for(Company::factory()))
            ->create();

        $response = $this->actingAs($user)->get("/tickets/{$ticket->id}/time-tracking/create");
        $response->assertForbidden();

        $response = $this->actingAs($user)->post("/tickets/{$ticket->id}/time-tracking/create");
        $response->assertForbidden();
    }

    /**
     * User has access to create time tracking if user is located on his company tickets page.
     */
    public function test_user_has_access_to_create_time_tracking_if_user_is_located_on_his_company_ticket_page()
    {
        $company = Company::factory()->create();
        $user = User::factory()
            ->for($company)
            ->create();

        $project = Project::factory()
            ->for($user, 'creator')
            ->for($company)
            ->create();

        $ticket = Ticket::factory()
            ->for($project)
            ->create();

        $response = $this->actingAs($user)->get("/tickets/{$ticket->id}/time-tracking/create");
        $response->assertOk();
    }
}
