<?php

declare(strict_types=1);

namespace App\Services\Role;

use App\Models\Permission;
use Illuminate\Support\Facades\Auth;

class GetIndexRoleCapabilityBySessionService
{
    public function execute()
    {
        $user = Auth::user();

        if(!$user->can(Permission::CAN_INDEX_ROLE)) {
            return false;
        }
        
        return true;
        
    }
}
