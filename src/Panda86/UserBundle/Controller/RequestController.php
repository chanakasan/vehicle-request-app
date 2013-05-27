<?php

namespace Panda86\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Panda86\UserBundle\Entity\Request as EmpRequest;
use Panda86\UserBundle\Form\RequestType;
/**
 * Request controller.
 *
 */
class RequestController extends Controller
{
    /**
     * Lists all Request entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Panda86UserBundle:Request')->findAll();

        return $this->render('Panda86UserBundle:Request:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Request entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new EmpRequest();
        $form = $this->createForm(new RequestType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('request_show', array('id' => $entity->getId())));
        }
        else{

        }

        return $this->render('Panda86UserBundle:Request:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Request entity.
     *
     */
    public function newAction()
    {
        $entity = new EmpRequest();
        $form   = $this->createForm(new RequestType(), $entity);

        return $this->render('Panda86UserBundle:Request:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Request entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Panda86UserBundle:Request')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Request entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('Panda86UserBundle:Request:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Request entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Panda86UserBundle:Request')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Request entity.');
        }

        $editForm = $this->createForm(new RequestType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('Panda86UserBundle:Request:edit.html.twig', array(
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

        $entity = $em->getRepository('Panda86UserBundle:Request')->find($id);

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

        return $this->render('Panda86UserBundle:Request:edit.html.twig', array(
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
            $entity = $em->getRepository('Panda86UserBundle:Request')->find($id);

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
            ->getForm();
    }
}
