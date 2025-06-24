<?php

namespace App\Policies;

class PredefinedKitPolicy extends AMSPermissionsPolicy
{
    protected function columnName()
    {
        return 'kits';
    }
}
