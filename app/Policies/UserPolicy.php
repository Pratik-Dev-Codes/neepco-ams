<?php

namespace App\Policies;

class UserPolicy extends AMSPermissionsPolicy
{
    protected function columnName()
    {
        return 'users';
    }
}
