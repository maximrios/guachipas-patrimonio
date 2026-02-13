<?php

namespace App\Models;
use Spatie\Permission\Models\Permission;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomPermission extends Permission
{
    use HasFactory;

    

    public const CAN_INDEX_PROJECT = 'project-index';
    public const CAN_CREATE_PROJECT = 'project-create';
    public const CAN_EDIT_PROJECT = 'project-edit';
    public const CAN_DESTROY_PROJECT = 'project-destroy';

    public const CAN_INDEX_PLAN = 'plan-index';
    public const CAN_CREATE_PLAN = 'plan-create';
    public const CAN_EDIT_PLAN = 'plan-edit';
    public const CAN_DESTROY_PLAN = 'plan-destroy';

    public const CAN_INDEX_ORGANIZATION = 'organization-index';
    public const CAN_CREATE_ORGANIZATION = 'organization-create';
    public const CAN_EDIT_ORGANIZATION = 'organization-edit';
    public const CAN_DESTROY_ORGANIZATION = 'organization-destroy';

    public const CAN_INDEX_TEMPLATE = 'template-index';
    public const CAN_CREATE_TEMPLATE = 'template-create';
    public const CAN_EDIT_TEMPLATE = 'template-edit';
    public const CAN_DESTROY_TEMPLATE = 'template-destroy';

    public const CAN_INDEX_AREA = 'area-index';
    public const CAN_CREATE_AREA = 'area-create';
    public const CAN_EDIT_AREA = 'area-edit';
    public const CAN_DESTROY_AREA = 'area-destroy';

    public const CAN_INDEX_USER = 'user-index';
    public const CAN_CREATE_USER = 'user-create';
    public const CAN_EDIT_USER = 'user-edit';
    public const CAN_DESTROY_USER = 'user-destroy';

    public const CAN_INDEX_ROLE = 'role-index';
    public const CAN_CREATE_ROLE = 'role-create';
    public const CAN_EDIT_ROLE = 'role-edit';
    public const CAN_DESTROY_ROLE = 'role-destroy';

    public const CAN_INDEX_EMPLOYEE = 'employee-index';
    public const CAN_CREATE_EMPLOYEE = 'employee-create';
    public const CAN_EDIT_EMPLOYEE = 'employee-edit';
    public const CAN_DESTROY_EMPLOYEE = 'employee-destroy';

    public const CAN_PROPOSE_AUDIT = 'audit-propose';
    public const CAN_GENERATE_AUDIT_PROGRAM= 'audit-generate-program';
    public const CAN_EDIT_AUDIT = 'audit-edit';
    public const CAN_DESTROY_AUDIT = 'audit-destroy';
    public const CAN_INIT_AUDIT = 'audit-init';
    public const CAN_APPROVE_AUDIT = 'audit-approve';
    public const CAN_FINISH_AUDIT = 'audit-finish';
    public const CAN_CONFIRM_AUDIT = 'audit-confirm';
    public const CAN_RESOLUTION_AUDIT = 'audit-resolution';

    public const CAN_CREATE_REPORT = 'report-create';
    public const CAN_EDIT_REPORT = 'report-edit';
    public const CAN_DESTROY_REPORT = 'report-destroy';
    public const CAN_UPLOAD_REPORT = 'report-upload';
    public const CAN_GENERATE_REPORT = 'report-generate';
    public const CAN_APPROVE_REPORT = 'report-approve';
    public const CAN_REJECT_REPORT = 'report-reject';
    public const CAN_REVIEW_REPORT = 'report-review';

    public const CAN_INDEX_PLANNING = 'planning-index';
    public const CAN_INDEX_EXECUTION = 'execution-index';
    public const CAN_INDEX_REPORTS = 'reports-index';
    public const CAN_VIEW_ALL_AUDIT = 'audit-view-all';

    public const CAN_INDEX_OBSERVATION = 'observation-index';
    public const CAN_CREATE_OBSERVATION = 'observation-create';
    public const CAN_EDIT_OBSERVATION = 'observation-edit';
    public const CAN_DESTROY_OBSERVATION = 'observation-destroy';

}
