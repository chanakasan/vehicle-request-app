<?php

namespace Panda86\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Panda86\AppBundle\Entity\Request as EmpRequest;
use Panda86\AppBundle\Entity\RequestEmployee;
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

        $entities = $em->getRepository('Panda86AppBundle:RequestEmployee')->getList();

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

        $entity = $em->getRepository('Panda86AppBundle:RequestEmployee')->find($id);
        $otherPassengers = $em->getRepository('Panda86AppBundle:RequestEmployee')->findOtherPassengers($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RequestEmployee entity.');
        }

        return $this->render('Panda86AppBundle:Request:show.html.twig', array(
            'embedded' => $embed,
            'entity' => $entity,
            'otherPassengers' => $otherPassengers,
        ));
    }

    /**
     * Find and display a request's details using the given code
     *
     */
    public function detailsAction($code)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Panda86AppBundle:RequestLink')->findByCode($code);
//        var_dump($entity); exit;
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RequestLink entity.');
        }

        return $this->render('Panda86AppBundle:Request:show.html.twig', array(
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

        $em = $this->getDoctrine()->getManager();
        $employees = $em->getRepository('Panda86AppBundle:Employee')->findAll();

//        var_dump($employees);exit;
        return $this->render('Panda86AppBundle:Request:new.html.twig', array(
            'employees'=> $employees,
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

            if(isset($_POST['requester']))
            {
                $owner_id = htmlentities($_POST['requester']);
            }
            else
            {
                throw $this->createNotFoundException("requester value not set");
            }

            $requestOwner = $em->getReference('Panda86AppBundle:Employee', $owner_id);

            $requestEmployee  = new RequestEmployee();
            $requestEmployee->setRequest($entity);
            $requestEmployee->setEmployee($requestOwner);
            $requestEmployee->setIsOwner(true);
            $em->persist($requestEmployee);

            if(isset($_POST['other_p']))
                $otherPassengers = $_POST['other_p'];
            else
                $otherPassengers = array();

            foreach($otherPassengers as $emp_id_tmp)
            {
                $reqEmptmp  = new RequestEmployee();
                $reqEmptmp->setRequest($entity);
                $employee_tmp = $em->getReference('Panda86AppBundle:Employee', htmlentities($emp_id_tmp));
                $reqEmptmp->setEmployee($employee_tmp);
                $reqEmptmp->setIsOwner(false);

                $em->persist($reqEmptmp);
            }
            $em->flush();

            $flashmsg = "Your request was sent successfully! ";
            // sendEmail()
            $flashmsg .= 'An email message with a link to your request\'s details will be sent to you shortly.';

            $this->get('session')->getFlashBag()->add(
                'success',
                $flashmsg
            );
            return $this->render('Panda86AppBundle:Request:finish.html.twig');
        }
        // if form is not valid
        $em = $this->getDoctrine()->getManager();
        $employees = $em->getRepository('Panda86AppBundle:Employee')->findAll();
        return $this->render('Panda86AppBundle:Request:new.html.twig', array(
            'employees' => $employees,
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Shows request finish page
     */
    public function finishAction()
    {
        return $this->render('Panda86AppBundle:Request:finish.html.twig');
    }

}
