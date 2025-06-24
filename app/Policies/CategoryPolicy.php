<?php

namespace App\Policies;

class CategoryPolicy extends AMSPermissionsPolicy
{
    protected function columnName()
    {
        return 'categories';
    }
}
