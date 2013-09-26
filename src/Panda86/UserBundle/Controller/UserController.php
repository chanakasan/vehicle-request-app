<?php

namespace Panda86\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Panda86\UserBundle\Form\UserType;
use Panda86\UserBundle\Entity\User;

class UserController extends Controller
{
    public function indexAction()
    {
        $em    = $this->get('doctrine.orm.entity_manager');
        $dql   = "SELECT u FROM Panda86UserBundle:User u";
        $query = $em->createQuery($dql);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->get('request')->query->get('page', 1)/*page number*/,
            10/*limit per page*/
        );

        return $this->render('Panda86UserBundle:User:index.html.twig', array(
            'pagination' => $pagination
        ));
    }

    public function newAction()
    {
        $entity = new User();
        $form   = $this->createForm(new UserType(), $entity);

        return $this->render('Panda86UserBundle:User:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    public function createAction(Request $request)
    {
        $entity = new User();
        $form   = $this->createForm(new UserType(), $entity);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            if('on' === $request->request->get('is_su')) $entity->setSuperAdmin(true); # create super admin

            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('user_show', array('id' => $entity->getId())));
        }

        return $this->render('Panda86UserBundle:User:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    public function showAction($id)
    {
        $repository = $this->getDoctrine()
            ->getRepository('Panda86UserBundle:User');

        $query = $repository->createQueryBuilder('u')
            ->select('u.id, u.username, u.first_name, u.last_name, u.email')
            ->where('u.id = :id')
            ->setParameter('id', $id)
            ->orderBy('u.username', 'ASC')
            ->getQuery();

        $user = $query->getResult();

        if (!$user) {
            throw $this->createNotFoundException(
                'No user id found '.$id
            );
        }
        //$user_arr = $user->toArray();
        return new Response(json_encode($user));
    }

    public function removeAction($id)
    {
        $user = $this->getDoctrine()
            ->getRepository('Panda86UserBundle:User')
            ->find($id);

        if (!$user) {
            throw $this->createNotFoundException(
                'No user id found '.$id
            );
        }
        $em = $this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();

        return $this->redirect($this->generateUrl('user_index'));
    }

}
