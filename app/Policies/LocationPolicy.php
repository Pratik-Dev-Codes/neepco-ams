<?php

namespace App\Policies;

class LocationPolicy extends AMSPermissionsPolicy
{
    protected function columnName()
    {
        return 'locations';
    }
}
