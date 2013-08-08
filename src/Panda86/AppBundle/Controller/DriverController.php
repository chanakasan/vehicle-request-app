<?php

namespace Panda86\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Panda86\AppBundle\Entity\Driver;
use Panda86\AppBundle\Form\DriverType;

/**
 * Driver controller.
 *
 */
class DriverController extends Controller
{
    /**
     * Lists all Driver entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Panda86AppBundle:Driver')->findAll();

        return $this->render('Panda86AppBundle:Driver:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Driver entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Driver();
        $form = $this->createForm(new DriverType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('driver_show', array('id' => $entity->getId())));
        }

        return $this->render('Panda86AppBundle:Driver:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Driver entity.
     *
     */
    public function newAction()
    {
        $entity = new Driver();
        $form   = $this->createForm(new DriverType(), $entity);

        return $this->render('Panda86AppBundle:Driver:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Driver entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Panda86AppBundle:Driver')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Driver entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('Panda86AppBundle:Driver:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Driver entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Panda86AppBundle:Driver')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Driver entity.');
        }

        $editForm = $this->createForm(new DriverType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('Panda86AppBundle:Driver:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Driver entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Panda86AppBundle:Driver')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Driver entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new DriverType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('driver', array('id' => $id)));
        }

        return $this->render('Panda86AppBundle:Driver:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Driver entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Panda86AppBundle:Driver')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Driver entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('driver'));
    }

    /**
     * Creates a form to delete a Driver entity by id.
     *
     * @param mixed $id The entity id
     *
//     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
