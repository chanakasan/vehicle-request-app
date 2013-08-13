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
class DisapprovedRequestController extends Controller
{
    /**
     * Lists all DisapprovedRequest entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Panda86AppBundle:DisapprovedRequest')->findAll();

        return $this->render('Panda86AppBundle:DisapprovedRequest:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new DisapprovedRequest entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new DisapprovedRequest();
        $form = $this->createForm(new DisapprovedRequestType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('disapprove_show', array('id' => $entity->getId())));
        }

        return $this->render('Panda86AppBundle:DisapprovedRequest:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new DisapprovedRequest entity.
     *
     */
    public function newAction()
    {
        $entity = new DisapprovedRequest();
        $form   = $this->createForm(new DisapprovedRequestType(), $entity);

        return $this->render('Panda86AppBundle:DisapprovedRequest:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a DisapprovedRequest entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Panda86AppBundle:DisapprovedRequest')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DisapprovedRequest entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('Panda86AppBundle:DisapprovedRequest:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing DisapprovedRequest entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Panda86AppBundle:DisapprovedRequest')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DisapprovedRequest entity.');
        }

        $editForm = $this->createForm(new DisapprovedRequestType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('Panda86AppBundle:DisapprovedRequest:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing DisapprovedRequest entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Panda86AppBundle:DisapprovedRequest')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DisapprovedRequest entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new DisapprovedRequestType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('disapprove_edit', array('id' => $id)));
        }

        return $this->render('Panda86AppBundle:DisapprovedRequest:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a DisapprovedRequest entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Panda86AppBundle:DisapprovedRequest')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find DisapprovedRequest entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('disapprove'));
    }

    /**
     * Creates a form to delete a DisapprovedRequest entity by id.
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
