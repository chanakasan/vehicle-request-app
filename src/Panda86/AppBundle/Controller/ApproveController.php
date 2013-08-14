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
    public function newAction($req_id)
    {
        $entity = new ApprovedRequest();
        $form   = $this->createForm(new ApprovedRequestType(), $entity);

        return $this->render('Panda86AppBundle:Approve:new.html.twig', array(
            'req_id' => $req_id,
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

            // sendEmail()
            $this->get('session')->getFlashBag()->add(
                'success',
                "Request #{$entity->getRequest()->getId()} was approved! An email message was sent to the requester."
            );
            return $this->redirect($this->generateUrl('request_list'));
        }

        return $this->render('Panda86AppBundle:Approve:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    public function emailAction()
    {
        $request = new \StdClass();
        $request->driver = new \StdClass();
        $request->vehicle = new \StdClass();

        $request->owner = 'Martin Doe';
        $request->id = 1;
        $request->vehicle->reg_no = 'Toyota Corolla - NB-3456';
        $request->driver->display_name = 'John Doe';

        $message = \Swift_Message::newInstance()
            ->setContentType("text/html")
            ->setSubject('Vehicle request status')
            ->setFrom('donotreply@icta.lk')
            ->setTo('chanakasan@gmail.com')
            ->setBody(
                $this->renderView(
                    'Panda86AppBundle:Template:disapproved-email.html.twig',
                    array('request' => $request)
                )
            )
        ;
        $this->get('mailer')->send($message);

        return new \Symfony\Component\HttpFoundation\Response('Email Sent!');
    }
}
