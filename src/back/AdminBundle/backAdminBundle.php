<?php

namespace back\AdminBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class backAdminBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
