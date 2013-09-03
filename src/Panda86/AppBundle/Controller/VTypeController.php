<?php

namespace Panda86\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Panda86\AppBundle\Entity\VType;
use Panda86\AppBundle\Form\VTypeType;

/**
 * VType controller.
 *
 */
class VTypeController extends Controller
{
    /**
     * Lists all VType entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Panda86AppBundle:VType')->findAll();

        return $this->render('Panda86AppBundle:VType:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new VType entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new VType();
        $form = $this->createForm(new VTypeType(), $entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            //set name for vehicle type
            $name = $entity->getPassengers().'-passenger '.ucfirst(trim($entity->getType()));
            $entity->setName($name);

            $em->persist($entity);
            $em->flush();

            $flashmsg = "$name created!";
            $this->get('session')->getFlashBag()->add(
                'success',
                $flashmsg
            );
            return $this->redirect($this->generateUrl('vtype'));
        }

        return $this->render('Panda86AppBundle:VType:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new VType entity.
     *
     */
    public function newAction()
    {
        $entity = new VType();
        $form   = $this->createForm(new VTypeType(), $entity);

        return $this->render('Panda86AppBundle:VType:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing VType entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('Panda86AppBundle:VType')->find($id);
        $this->_checkResult($entity, 'vtype');

        $editForm = $this->createForm(new VTypeType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('Panda86AppBundle:VType:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing VType entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('Panda86AppBundle:VType')->find($id);
        $this->_checkResult($entity, 'vtype');

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new VTypeType(), $entity);
        $editForm->handleRequest($request);

        if ($this->getRequest()->getMethod() == 'PUT') {
            $params = $request->get('vtype');
            $entity->setType($params['type']);
            $entity->setPassengers($params['passengers']);
            $entity->setName($params['name']);

            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'success',
                'Changes has been saved!'
            );
            return $this->redirect($this->generateUrl('vtype'));
        }

        return $this->render('Panda86AppBundle:VType:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a VType entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($this->getRequest()->getMethod() == 'DELETE') {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Panda86AppBundle:VType')->find($id);
            $this->_checkResult($entity, 'vtype');

            $vehicles = $entity->getVehicles();
            if(count($vehicles) > 0)
            {
                $v_list = '[ ';
                foreach($vehicles as $vehicle)
                {
                    $v_list.= $vehicle->getMake().' '.$vehicle->getModel().' '.$vehicle->getRegNo().' ... ';
                }
                $v_list.= ']';
                $this->get('session')->getFlashBag()->add(
                    'error',
                    'There are vehicles assigned to this vehicle type.
                    Please change the type of the vehicles listed below before you can delete this entry. i.e. '.$v_list
                );
                return $this->redirect($this->generateUrl('vtype_edit', array('id' => $id)));
            }
            $em->remove($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'success',
                $entity->getName().' has been deleted!'
            );
        }
        return $this->redirect($this->generateUrl('vtype'));
    }

    /**
     * Creates a form to delete a VType entity by id.
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

    private function _checkResult($entity, $redirectRoute)
    {
        try {
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find VType entity.');
            }
        }
        catch(\Exception $e)
        {
            $this->get('session')->getFlashBag()->add(
                'error',
                'Oops! looks like something went wrong.'
            );
            return $this->redirect($this->generateUrl($redirectRoute));
        }
    }
}
