<?php

namespace Acme\SandboxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class SandboxController extends Controller {

    public function indexAction()
    {
        return new Response("Greetings ! Sandbox environment");
    }

}