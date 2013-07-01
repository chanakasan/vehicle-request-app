<?php

namespace Panda86\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('Panda86AppBundle:Home:index.html.twig');
    }
}
