<?php

namespace Panda86\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('Panda86UserBundle:Default:index.html.twig');
    }
}
