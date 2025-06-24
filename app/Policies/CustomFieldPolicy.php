<?php

namespace App\Policies;

class CustomFieldPolicy extends AMSPermissionsPolicy
{
    protected function columnName()
    {
        return 'customfields';
    }
}
