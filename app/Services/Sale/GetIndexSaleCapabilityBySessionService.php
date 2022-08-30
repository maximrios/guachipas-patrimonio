<?php

declare(strict_types=1);

namespace App\Services\Sale;

use App\Models\Permission;
use Illuminate\Support\Facades\Auth;

class GetIndexSaleCapabilityBySessionService
{
    public function execute()
    {
        $user = Auth::user();
        
        if(!$user->can(Permission::CAN_INDEX_SALE)) {
            return false;
        }
        
        return true;
        
    }
}
