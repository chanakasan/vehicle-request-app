<?php

namespace Panda86\AppBundle\Controller;

use Panda86\AppBundle\Entity\RequestLink;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Panda86\AppBundle\Entity\Request as EmpRequest;
use Panda86\AppBundle\Form\RequestType;
/**
 * Request controller.
 *
 */
class RequestController extends Controller
{
    /**
     * Shows the start page for a request
     */
    public function indexAction()
    {
        return $this->render('Panda86AppBundle:Request:start.html.twig');
    }

    /**
     * Lists all RequestEmployee entities.
     *
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('Panda86AppBundle:Request')->findAll();

        return $this->render('Panda86AppBundle:Request:list.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a RequestEmployee entity.
     *
     */
    public function showAction($id, $embed = false)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('Panda86AppBundle:Request')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RequestEmployee entity.');
        }

        return $this->render('Panda86AppBundle:Request:show.html.twig', array(
            'embedded' => $embed,
            'entity' => $entity,
        ));
    }

    /**
     * Find and display a request's details using the given code
     *
     */
    public function detailsAction($code)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Panda86AppBundle:RequestLink')->findOneBy(array('code' => $code));

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RequestLink entity.');
        }

        return $this->render('Panda86AppBundle:Request:details.html.twig', array(
            'entity' => $entity->getRequest(),
        ));
    }

    /**
     * Displays a form to create a new Request entity.
     */
    public function newAction()
    {
        $entity = new EmpRequest();
        $form   = $this->createForm(new RequestType(), $entity);

        return $this->render('Panda86AppBundle:Request:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Persist form data to database.
     */
    public function createAction(Request $request)
    {
        $entity  = new EmpRequest();
        $form = $this->createForm(new RequestType(), $entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            /* create a random code link to request */
            $reqLink = new RequestLink();
            $reqLink->setRequest($entity);
            $em->persist($reqLink);

            $em->flush();

            $flashmsg = "Your request has been sent! ";

            $code  = $reqLink->getCode();
            $email = $entity->getRequester()->getEmail();

            if($this->_sendMail($email, $entity, $code))
            {
                $flashmsg .= 'An email message with a link to your request\'s details will be sent to you shortly.';
            }
            else
            {
                $flashmsg .= 'Email sending failed!';
            }

            $this->get('session')->getFlashBag()->add(
                'success',
                $flashmsg
            );
            return $this->render('Panda86AppBundle:Request:finish.html.twig');
        }
        // if form is not valid
        return $this->render('Panda86AppBundle:Request:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Shows request finish page
     */
    public function finishAction($mode = 'cancel')
    {
        if($mode === 'cancel')
        {
            $this->get('session')->getFlashBag()->add(
                'warning',
                'The request was cancelled!'
            );
        }
        return $this->render('Panda86AppBundle:Request:finish.html.twig');
    }

    private  function _sendMail($email, $entity, $code)
    {
        $message = \Swift_Message::newInstance()
            ->setContentType("text/html")
            ->setSubject('Vehicle request created!')
            ->setFrom('donotreply@icta.lk')
            ->setTo($email)
            ->setBody(
                $this->renderView(
                    'Panda86AppBundle:Template:request-created-email.html.twig', array(
                        'entity' => $entity,
                        'code' => $code
                     )
                )
            )
        ;
        $this->get('mailer')->send($message);

        return true;
    }
}
