<?php

namespace Panda86\AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Panda86\AppBundle\Entity\RequestEmployee;

/**
 * RequestEmployee controller.
 *
 */
class RequestEmployeeController extends Controller
{
    /**
     * Lists all RequestEmployee entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Panda86AppBundle:RequestEmployee')->getList();

        return $this->render('Panda86AppBundle:RequestEmployee:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a RequestEmployee entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Panda86AppBundle:RequestEmployee')->find($id);
        $otherPassengers = $em->getRepository('Panda86AppBundle:RequestEmployee')->findOtherPassengers($id);

//        var_dump($otherPassengers);exit;
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RequestEmployee entity.');
        }

        return $this->render('Panda86AppBundle:RequestEmployee:show.html.twig', array(
            'entity'      => $entity,
            'otherPassengers' => $otherPassengers,
        ));
    }

}
