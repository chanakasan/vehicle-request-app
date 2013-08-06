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
class ApprovedRequestController extends Controller
{
    /**
     * Lists all ApprovedRequest entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Panda86AppBundle:ApprovedRequest')->findAll();

        return $this->render('Panda86AppBundle:ApprovedRequest:index.html.twig', array(
            'entities' => $entities,
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
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('approved_show', array('id' => $entity->getId())));
        }

        return $this->render('Panda86AppBundle:ApprovedRequest:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new ApprovedRequest entity.
     *
     */
    public function newAction()
    {
        $entity = new ApprovedRequest();
        $form   = $this->createForm(new ApprovedRequestType(), $entity);

        return $this->render('Panda86AppBundle:ApprovedRequest:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ApprovedRequest entity.
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

        return $this->render('Panda86AppBundle:ApprovedRequest:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing ApprovedRequest entity.
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

        return $this->render('Panda86AppBundle:ApprovedRequest:edit.html.twig', array(
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
            throw $this->createNotFoundException('Unable to find ApprovedRequest entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ApprovedRequestType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('approved_edit', array('id' => $id)));
        }

        return $this->render('Panda86AppBundle:ApprovedRequest:edit.html.twig', array(
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
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Panda86AppBundle:ApprovedRequest')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ApprovedRequest entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('approved'));
    }

    /**
     * Creates a form to delete a ApprovedRequest entity by id.
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
