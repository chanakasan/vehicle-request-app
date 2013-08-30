<?php

namespace Panda86\AppBundle\Controller;

use Panda86\AppBundle\Entity\ApprovedCab;
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
                'requester' => $entity->getRequest()->getRequester()->getName(),
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
        $cab  = new ApprovedCab();
        $entity->setCab($cab);

        $form = $this->createForm(new ApprovedRequestType(), $entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $entity->getRequest()->setStatus(1);
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $flashmsg = "#{$entity->getRequest()->getId()} has been approved! ";

            $reqLink = $em->getRepository('Panda86AppBundle:RequestLink')->findOneBy(array('request' => $entity->getRequest()->getId()));
            $code  = $reqLink->getCode();
            $email = $entity->getRequest()->getRequester()->getEmail();


            if($this->_sendMail($email, $entity, $code))
            {
                $flashmsg .= 'An email message has been sent to the requester.';
            }
            else
            {
                $this->get('session')->getFlashBag()->add(
                    'error',
                    'Email sending failed!'
                );
            }

            $this->get('session')->getFlashBag()->add(
                'info',
                $flashmsg
            );
            return $this->redirect($this->generateUrl('request_list'));
        }

        return $this->render('Panda86AppBundle:Approve:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    private  function _sendMail($email, $entity, $code)
    {
        $message = \Swift_Message::newInstance()
            ->setContentType("text/html")
            ->setSubject('Vehicle request approved!')
            ->setFrom('donotreply@icta.lk')
            ->setTo($email)
            ->setBody(
                $this->renderView(
                    'Panda86AppBundle:Template:request-approved-email.html.twig', array(
                        'entity' => $entity,
                        'code' => $code
                    )
                )
            )
        ;
        try {
            $this->get('mailer')->send($message);
            return true;
        }
        catch(\Exception $e)
        {
            return false;
        }
    }
}
