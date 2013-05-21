<?php

namespace Panda86\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Panda86\UserBundle\Entity\Vehicle;
use Panda86\UserBundle\Form\VehicleType;

/**
 * Vehicle controller.
 *
 */
class VehicleController extends Controller
{
    /**
     * Lists all Vehicle entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Panda86UserBundle:Vehicle')->findAll();

        return $this->render('Panda86UserBundle:Vehicle:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Vehicle entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Vehicle();
        $form = $this->createForm(new VehicleType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('vehicle_show', array('id' => $entity->getId())));
        }

        return $this->render('Panda86UserBundle:Vehicle:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Vehicle entity.
     *
     */
    public function newAction()
    {
        $entity = new Vehicle();
        $form   = $this->createForm(new VehicleType(), $entity);

        return $this->render('Panda86UserBundle:Vehicle:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Vehicle entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Panda86UserBundle:Vehicle')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Vehicle entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('Panda86UserBundle:Vehicle:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Vehicle entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Panda86UserBundle:Vehicle')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Vehicle entity.');
        }

        $editForm = $this->createForm(new VehicleType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('Panda86UserBundle:Vehicle:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Vehicle entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Panda86UserBundle:Vehicle')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Vehicle entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new VehicleType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('vehicle_edit', array('id' => $id)));
        }

        return $this->render('Panda86UserBundle:Vehicle:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Vehicle entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Panda86UserBundle:Vehicle')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Vehicle entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('vehicle'));
    }

    /**
     * Creates a form to delete a Vehicle entity by id.
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
