<?php

namespace App\Policies;

class ManufacturerPolicy extends AMSPermissionsPolicy
{
    protected function columnName()
    {
        return 'manufacturers';
    }
}
