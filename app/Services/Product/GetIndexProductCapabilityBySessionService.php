<?php

declare(strict_types=1);

namespace App\Services\Product;

use App\Models\Permission;
use Illuminate\Support\Facades\Auth;

class GetIndexProductCapabilityBySessionService
{
    public function execute()
    {
        $user = Auth::user();
        
        if(!$user->can(Permission::CAN_INDEX_PRODUCT)) {
            return false;
        }
        
        return true;
        
    }
}
