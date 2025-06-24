<?php

namespace App\Policies;

class StatuslabelPolicy extends AMSPermissionsPolicy
{
    protected function columnName()
    {
        return 'statuslabels';
    }
}
