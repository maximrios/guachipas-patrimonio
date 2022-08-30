<?php

declare(strict_types=1);

namespace App\Services\Assignment;

use App\Models\Permission;
use Illuminate\Support\Facades\Auth;

class GetIndexAssignmentCapabilityBySessionService
{
    public function execute()
    {
        $user = Auth::user();
        
        if(!$user->can(Permission::CAN_INDEX_ASSIGNMENT)) {
            return false;
        }
        
        return true;
        
    }
}
