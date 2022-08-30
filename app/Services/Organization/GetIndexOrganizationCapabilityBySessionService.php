<?php

declare(strict_types=1);

namespace App\Services\Organization;

use App\Models\Permission;
use Illuminate\Support\Facades\Auth;

class GetIndexOrganizationCapabilityBySessionService
{
    public function execute()
    {
        $user = Auth::user();
        
        if(!$user->can(Permission::CAN_INDEX_ORGANIZATION)) {
            return false;
        }
        
        return true;
        
    }
}
