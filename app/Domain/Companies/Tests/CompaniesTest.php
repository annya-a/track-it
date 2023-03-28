<?php

namespace App\Domain\Companies\Tests;

use App\domain\Companies\Models\Company;
use App\Domain\Users\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @group companies
 */
class CompaniesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Company should be in database after creation.
     */
    public function test_company_should_be_in_database_after_creation(): void
    {
        $project = Company::factory()->create();

        $this->assertModelExists($project);
    }

    /**
     * Guest has no access to create company
     */
    public function test_guest_has_no_access_to_create_company(): void
    {
        $response = $this->get('/companies/create');
        $response->assertRedirect('/login');

        $response = $this->post('/companies/create');
        $response->assertRedirect('/login');
    }

    /**
     * User has access to create company if he hasn't created it yet.
     */
    public function test_user_has_access_to_create_company_if_he_hasnt_created_it_yet()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/companies/create');
        $response->assertStatus(200);
    }

    /**
     * User has no access to create company if he has already created it.
     */
    public function test_user_has_no_access_to_create_company_if_he_has_already_created_it_yet()
    {
        $company = Company::factory()->create();
        $user = User::factory()
            ->for($company)
            ->create();

        $response = $this->actingAs($user)->get('/companies/create');
        $response->assertStatus(403);
    }

    /**
     * User enters wrong data on company form and receives errors.
     */
    public function test_user_enters_wrong_data_on_company_form_and_receives_errors()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post('/companies/create', ['name' => '']);
        $response->assertSessionHasErrors(['name']);
    }

    /**
     * User creates company and he is a companie's creator.
     */
    public function test_user_creates_company_and_he_is_a_companies_creator()
    {
        $user = User::factory()->create();

        $this->assertDatabaseMissing('companies', ['creator_id' => $user->id]);

        $response = $this->actingAs($user)
            ->post('/companies/create', ['name' => 'My company']);
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('companies', ['creator_id' => $user->id]);
    }

    /**
     * User creates company and belongs to this company.
     */
    public function test_user_creates_company_and_belongs_to_this_company()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post('/companies/create', ['name' => 'My company']);

        $company = Company::latest()->first();

        $this->assertEquals($company->id, $user->refresh()->company_id);
    }

    /**
     * User creates company and he is redirected to create project page.
     */
    public function test_user_creates_company_and_he_is_redirected_to_create_project_page()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post('/companies/create', ['name' => 'My company']);

        $response->assertRedirect('projects/create');
    }
}
