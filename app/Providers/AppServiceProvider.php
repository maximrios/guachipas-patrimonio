<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Services\Role\GetIndexRoleCapabilityBySessionService;
use App\Services\Sale\GetIndexSaleCapabilityBySessionService;
use App\Services\User\GetIndexUserCapabilityBySessionService;
use App\Services\Order\GetIndexOrderCapabilityBySessionService;
use App\Services\Product\GetIndexProductCapabilityBySessionService;
use App\Services\Provider\GetIndexProviderCapabilityBySessionService;
use App\Services\Inventory\GetIndexInventoryCapabilityBySessionService;
use App\Services\Assignment\GetIndexAssignmentCapabilityBySessionService;
use App\Services\Organization\GetIndexOrganizationCapabilityBySessionService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*
        View::composer('layouts.app', function ($view) {
            
            $getIndexOrderCapability = (new GetIndexOrderCapabilityBySessionService())->execute();
            $getIndexSaleCapability = (new GetIndexSaleCapabilityBySessionService())->execute();
            $getIndexInventoryCapability = (new GetIndexInventoryCapabilityBySessionService())->execute();
            $getIndexAssignmentCapability = (new GetIndexAssignmentCapabilityBySessionService())->execute();
            $getIndexOrganizationCapability = (new GetIndexOrganizationCapabilityBySessionService())->execute();
            $getIndexProductCapability = (new GetIndexProductCapabilityBySessionService())->execute();
            $getIndexProviderCapability = (new GetIndexProviderCapabilityBySessionService())->execute();
            $getIndexUserCapability = (new GetIndexUserCapabilityBySessionService())->execute();
            $getIndexRoleCapability = (new GetIndexRoleCapabilityBySessionService())->execute();
            
            $view->with('getIndexOrderCapability', $getIndexOrderCapability)
                ->with('getIndexSaleCapability', $getIndexSaleCapability)
                ->with('getIndexInventoryCapability', $getIndexInventoryCapability)
                ->with('getIndexAssignmentCapability', $getIndexAssignmentCapability)
                ->with('getIndexOrganizationCapability', $getIndexOrganizationCapability)
                ->with('getIndexProductCapability', $getIndexProductCapability)
                ->with('getIndexProviderCapability', $getIndexProviderCapability)
                ->with('getIndexUserCapability', $getIndexUserCapability)
                ->with('getIndexRoleCapability', $getIndexRoleCapability);

        });
        */
    }
}
