<?php

namespace App\Domain\Tickets\Tests;

use App\Domain\Companies\Models\Company;
use App\Domain\Projects\Models\Project;
use App\Domain\Tickets\Models\Ticket;
use App\Domain\Users\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @group tickets
 * @group search
 */
class TicketsSearchTest extends TestCase
{
    use RefreshDatabase;

    /**
     * When user searches he sees ticket which related to the search query.
     */
    public function test_when_user_searches_he_sees_ticket_which_related_to_the_search_query(): void
    {
        $company = Company::factory()->create();
        $user = User::factory()
            ->for($company)
            ->create();

        Ticket::factory(['title' => 'My first Ticket'])
            ->for(Project::factory()->for($company))
            ->create();

        $response = $this->actingAs($user)->get('tickets?search=first');
        $response->assertSeeText('My first Ticket');
    }

    /**
     * When user searches he doesn't see ticket which isn't related to the search query.
     */
    public function test_when_user_searches_he_doesnt_see_ticket_which_isnt_related_to_the_search_query(): void
    {
        $company = Company::factory()->create();
        $user = User::factory()
            ->for($company)
            ->create();

        Ticket::factory(['title' => 'My first Ticket'])
            ->for(Project::factory()->for($company))
            ->create();

        $response = $this->actingAs($user)->get('tickets?search=unrelated-query');
        $response->assertDontSeeText('My first Ticket');
    }

    /**
     * When user searches he doesn't see ticket which belongs to another company.
     */
    public function test_when_user_searches_he_doesnt_see_ticket_which_belongs_to_another_company(): void
    {
        $company1 = Company::factory()->create();
        $user = User::factory()
            ->for($company1)
            ->create();

        $company2 = Company::factory()->create();
        Ticket::factory(['title' => 'My first Ticket'])
            ->for(Project::factory()->for($company2))
            ->create();

        $response = $this->actingAs($user)->get('tickets?search=first');
        $response->assertDontSeeText('My first Ticket');
    }
}
