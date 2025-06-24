<?php

namespace App\Policies;

class SupplierPolicy extends AMSPermissionsPolicy
{
    protected function columnName()
    {
        return 'suppliers';
    }
}
