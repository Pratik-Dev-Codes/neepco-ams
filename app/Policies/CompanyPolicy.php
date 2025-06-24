<?php

namespace App\Policies;

class CompanyPolicy extends AMSPermissionsPolicy
{
    protected function columnName()
    {
        return 'companies';
    }
}
