<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Domain\Companies\Models\Company;
use App\Domain\Companies\Policies\CompanyPolicy;
use App\Domain\Projects\Models\Project;
use App\Domain\Projects\Policies\ProjectPolicy;
use App\Domain\Tickets\Models\Ticket;
use App\Domain\Tickets\Policies\TicketPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Company::class => CompanyPolicy::class,
        Project::class => ProjectPolicy::class,
        Ticket::class => TicketPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
