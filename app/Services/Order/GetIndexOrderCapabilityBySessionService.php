<?php

declare(strict_types=1);

namespace App\Services\Order;

use App\Models\Permission;
use Illuminate\Support\Facades\Auth;

class GetIndexOrderCapabilityBySessionService
{
    public function execute()
    {
        $user = Auth::user();
        
        if(!$user->can(Permission::CAN_INDEX_ORDER)) {
            return false;
        }
        
        return true;
        
    }
}
