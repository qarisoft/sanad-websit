<?php

namespace App\Enums;

enum UserType: string
{
    case Viewer = 'viewer';
    case Employee = 'employee';
    case Admin = 'admin';
    case SuperAdmin = 'super_admin';
    case Customer = 'customer';
    case CompanyOwner = 'company_owner';

}
