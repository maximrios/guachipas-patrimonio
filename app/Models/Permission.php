<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    public const CAN_INDEX_ORDER = 'order-index';
    public const CAN_CREATE_ORDER = 'order-create';
    public const CAN_EDIT_ORDER = 'order-edit';
    public const CAN_DESTROY_ORDER = 'order-destroy';

    public const CAN_INDEX_SALE = 'sale-index';
    public const CAN_CREATE_SALE = 'sale-create';
    public const CAN_EDIT_SALE = 'sale-edit';
    public const CAN_DESTROY_SALE = 'sale-destroy';

    public const CAN_INDEX_INVENTORY = 'inventory-index';
    public const CAN_CREATE_INVENTORY = 'inventory-create';
    public const CAN_EDIT_INVENTORY = 'inventory-edit';
    public const CAN_DESTROY_INVENTORY = 'inventory-destroy';

    public const CAN_INDEX_ASSIGNMENT = 'assignment-index';
    public const CAN_CREATE_ASSIGNMENT = 'assignment-create';
    public const CAN_EDIT_ASSIGNMENT = 'assignment-edit';
    public const CAN_DESTROY_ASSIGNMENT = 'assignment-destroy';

    public const CAN_INDEX_AREA = 'area-index';
    public const CAN_CREATE_AREA = 'area-create';
    public const CAN_EDIT_AREA = 'area-edit';
    public const CAN_DESTROY_AREA = 'area-destroy';

    public const CAN_INDEX_PRODUCT = 'product-index';
    public const CAN_CREATE_PRODUCT = 'product-create';
    public const CAN_EDIT_PRODUCT = 'product-edit';
    public const CAN_DESTROY_PRODUCT = 'product-destroy';

    public const CAN_INDEX_PROVIDER = 'provider-index';
    public const CAN_CREATE_PROVIDER = 'provider-create';
    public const CAN_EDIT_PROVIDER = 'provider-edit';
    public const CAN_DESTROY_PROVIDER = 'provider-destroy';

    public const CAN_INDEX_USER = 'user-index';
    public const CAN_CREATE_USER = 'user-create';
    public const CAN_EDIT_USER = 'user-edit';
    public const CAN_DESTROY_USER = 'user-destroy';

    public const CAN_INDEX_ROLE = 'role-index';
    public const CAN_CREATE_ROLE = 'role-create';
    public const CAN_EDIT_ROLE = 'role-edit';
    public const CAN_DESTROY_ROLE = 'role-destroy';

}
