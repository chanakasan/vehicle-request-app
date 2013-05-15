<?php

namespace Panda86\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class Panda86UserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
