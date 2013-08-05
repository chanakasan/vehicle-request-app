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
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Panda86AppBundle:RequestEmployee')->find($id);
        $otherPassengers = $em->getRepository('Panda86AppBundle:RequestEmployee')->findOtherPassengers($id);

//        var_dump($otherPassengers);exit;
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RequestEmployee entity.');
        }

        return $this->render('Panda86AppBundle:Request:show.html.twig', array(
            'entity'      => $entity,
            'otherPassengers' => $otherPassengers,
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
        $form->bind($request);

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

    /**
     * Displays a form to edit an existing Request entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Panda86AppBundle:Request')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Request entity.');
        }

        $editForm = $this->createForm(new RequestType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('Panda86AppBundle:Request:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Request entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Panda86AppBundle:Request')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Request entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new RequestType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('request_edit', array('id' => $id)));
        }

        return $this->render('Panda86AppBundle:Request:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Request entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Panda86AppBundle:Request')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Request entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('request'));
    }

    /**
     * Creates a form to delete a Request entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
