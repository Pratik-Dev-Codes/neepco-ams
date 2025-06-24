<?php

namespace App\Policies;

class DepartmentPolicy extends AMSPermissionsPolicy
{
    protected function columnName()
    {
        return 'departments';
    }
}
