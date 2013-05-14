<?php

namespace Panda86\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('Panda86AdminBundle:Default:index.html.twig');
    }
}
