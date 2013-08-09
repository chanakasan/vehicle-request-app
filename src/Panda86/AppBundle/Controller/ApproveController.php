<?php

namespace Panda86\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Panda86\AppBundle\Entity\ApprovedRequest;
use Panda86\AppBundle\Form\ApprovedRequestType;

/**
 * ApprovedRequest controller.
 *
 */
class ApproveController extends Controller
{
    /**
     *  Send json data about approved requests
     */
    public function getJsonAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('Panda86AppBundle:ApprovedRequest')->findAll();

        $allApproved = array();
        foreach($entities as $entity)
        {
            $vehicle =  $entity->getVehicle()->getMake();
            $vehicle .= ' '.$entity->getVehicle()->getModel();
            $vehicle .= ' - '.$entity->getVehicle()->getRegno();

            $pickuptime = $entity->getRequest()->getPickupTime();
            $start = $pickuptime->format('Y-m-d H:i:s');

            $temp = array(
                'title' => $vehicle,
                'start' => $start,
                'vehicle' => $vehicle,
                'driver' => $entity->getDriver()->getDisplayname(),
            );
            $allApproved[] = $temp;
        }
        $response = new \Symfony\Component\HttpFoundation\Response(json_encode($allApproved));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * Displays a form to create a new ApprovedRequest entity.
     *
     */
    public function newAction()
    {
        $entity = new ApprovedRequest();
        $form   = $this->createForm(new ApprovedRequestType(), $entity);

        return $this->render('Panda86AppBundle:Approve:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new ApprovedRequest entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new ApprovedRequest();
        $form = $this->createForm(new ApprovedRequestType(), $entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $entity->getRequest()->setStatus(1);
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('request_list'));
        }

        return $this->render('Panda86AppBundle:Approve:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Approve entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Panda86AppBundle:ApprovedRequest')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ApprovedRequest entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('Panda86AppBundle:Approve:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Approved entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Panda86AppBundle:ApprovedRequest')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ApprovedRequest entity.');
        }

        $editForm = $this->createForm(new ApprovedRequestType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('Panda86AppBundle:Approved:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing ApprovedRequest entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Panda86AppBundle:ApprovedRequest')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Approved entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ApprovedRequestType(), $entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('approve_edit', array('id' => $id)));
        }

        return $this->render('Panda86AppBundle:Approve:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ApprovedRequest entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Panda86AppBundle:ApprovedRequest')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ApprovedRequest entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('request_list'));
    }

    /**
     * Creates a form to delete a ApprovedRequest entity by id.
     *
     * @param mixed $id The entity id
     *
//     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }

    public function emailAction()
    {
        $name = 'Chanaka';
        $message = \Swift_Message::newInstance()
            ->setSubject('Hello Email')
            ->setFrom('send@example.com')
            ->setTo('chanakasan@gmail.com')
            ->setBody(
                $this->renderView(
                    'Panda86AppBundle:Template:approved-email.html.twig',
                    array('name' => $name)
                )
            )
        ;
        $this->get('mailer')->send($message);

        return new \Symfony\Component\HttpFoundation\Response('Email Sent!');
    }
}
