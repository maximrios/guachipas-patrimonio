<?php

declare(strict_types=1);

namespace App\Services\User;

use App\Models\Permission;
use Illuminate\Support\Facades\Auth;

class GetIndexUserCapabilityBySessionService
{
    public function execute()
    {
        $user = Auth::user();
        
        if(!$user->can(Permission::CAN_INDEX_USER)) {
            return false;
        }
        
        return true;
        
    }
}
