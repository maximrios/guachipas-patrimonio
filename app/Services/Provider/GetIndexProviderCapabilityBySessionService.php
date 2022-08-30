<?php

declare(strict_types=1);

namespace App\Services\Provider;

use App\Models\Permission;
use Illuminate\Support\Facades\Auth;

class GetIndexProviderCapabilityBySessionService
{
    public function execute()
    {
        $user = Auth::user();
        
        if(!$user->can(Permission::CAN_INDEX_PROVIDER)) {
            return false;
        }
        
        return true;
        
    }
}
