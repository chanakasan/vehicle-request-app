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
        $form = $this->createForm(new DisapprovedRequestType(), $entity, array(
            'em' => $this->getDoctrine()->getManager()
        ));
        $form->handleRequest($request);

        if ($form->isValid()) {
            $current_user = $this->get('security.context')->getToken()->getUser();
            $entity->setDisapprovedBy($current_user);

            $entity->getRequest()->setStatus(2);
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $flashmsg = "#{$entity->getRequest()->getId()} has been disapproved! ";

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
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('Panda86AppBundle:Request')->find($req_id);

        if(!$entity || $entity->getStatus() != 0)
        {
            throw $this->createNotFoundException('Can\'t disapprove the request with id '.$req_id);
        }
        $entity = new DisapprovedRequest();
        $form   = $this->createForm(new DisapprovedRequestType(), $entity, array(
            'em' => $this->getDoctrine()->getManager()
        ));

        return $this->render('Panda86AppBundle:Disapprove:new.html.twig', array(
            'req_id' => $req_id,
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    private  function _sendMail($email, $entity, $code)
    {
        $message = \Swift_Message::newInstance()
            ->setContentType("text/html")
            ->setSubject('Vehicle request disapproved due to unavailability')
            ->setFrom('donotreply@icta.lk')
            ->setTo($email)
            ->setBody(
                $this->renderView(
                    'Panda86AppBundle:Template:request-disapproved-email.html.twig', array(
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
