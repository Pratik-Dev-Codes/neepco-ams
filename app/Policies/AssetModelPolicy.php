<?php

namespace App\Policies;

class AssetModelPolicy extends AMSPermissionsPolicy
{
    protected function columnName()
    {
        return 'models';
    }
}
