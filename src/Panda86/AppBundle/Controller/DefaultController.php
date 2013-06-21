<?php

namespace Panda86\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('Panda86AppBundle:Default:index.html.twig', array('name' => $name));
    }
}
