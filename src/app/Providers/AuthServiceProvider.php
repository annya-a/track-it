<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Domain\Companies\Models\Company;
use Domain\Companies\Policies\CompanyPolicy;
use Domain\Projects\Models\Project;
use Domain\Projects\Policies\ProjectPolicy;
use Domain\Tickets\Models\Ticket;
use Domain\Tickets\Policies\TicketPolicy;
use Domain\TimeTracking\Models\TimeTracking;
use Domain\TimeTracking\Policies\TimeTrackingPolicy;
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
        TimeTracking::class => TimeTrackingPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
