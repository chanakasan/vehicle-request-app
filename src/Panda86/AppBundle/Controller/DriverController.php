<?php

namespace Panda86\AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Panda86\AppBundle\Entity\Driver;

/**
 * Driver controller.
 *
 */
class DriverController extends Controller
{
    /**
     * Lists all Driver entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Panda86AppBundle:Driver')->findAll();

        return $this->render('Panda86AppBundle:Driver:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Driver entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Panda86AppBundle:Driver')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Driver entity.');
        }

        return $this->render('Panda86AppBundle:Driver:show.html.twig', array(
            'entity'      => $entity,
        ));
    }

}
