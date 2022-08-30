<?php

declare(strict_types=1);

namespace App\Services\Inventory;

use App\Models\Permission;
use Illuminate\Support\Facades\Auth;

class GetIndexInventoryCapabilityBySessionService
{
    public function execute()
    {
        $user = Auth::user();
        
        if(!$user->can(Permission::CAN_INDEX_INVENTORY)) {
            return false;
        }
        
        return true;
        
    }
}
