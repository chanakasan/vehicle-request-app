<?php

namespace Panda86\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Panda86\AppBundle\Entity\DisapprovedRequest;
use Panda86\AppBundle\Form\DisapprovedRequestType;

/**
 * DisapprovedRequest controller.
 *
 */
class DisapproveController extends Controller
{
    /**
     * Creates a new DisapprovedRequest entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new DisapprovedRequest();
        $form = $this->createForm(new DisapprovedRequestType(), $entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('request_list', array('id' => $entity->getId())));
        }

        return $this->render('Panda86AppBundle:Disapprove:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new DisapprovedRequest entity.
     *
     */
    public function newAction($req_id)
    {
        $entity = new DisapprovedRequest();
        $form   = $this->createForm(new DisapprovedRequestType(), $entity);

        return $this->render('Panda86AppBundle:Disapprove:new.html.twig', array(
            'req_id' => $req_id,
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

}
