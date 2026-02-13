<?php

namespace App\Providers;

use App\Models\Assignment;
use App\Models\Inventory;
use App\Models\Area;
use App\Policies\AreaPolicy;
use App\Policies\AssignmentPolicy;
use App\Policies\InventoryPolicy;
use App\Policies\SalePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Order::class => OrderPolicy::class,
        Sale::class => SalePolicy::class,
        Inventory::class => InventoryPolicy::class,
        Assignment::class => AssignmentPolicy::class,
        Area::class => AreaPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
