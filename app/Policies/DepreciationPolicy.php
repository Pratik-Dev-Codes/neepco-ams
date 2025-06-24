<?php

namespace App\Policies;

class DepreciationPolicy extends AMSPermissionsPolicy
{
    protected function columnName()
    {
        return 'depreciations';
    }
}
