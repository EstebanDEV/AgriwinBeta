<?php

namespace Agriwin\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class AgriwinUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
