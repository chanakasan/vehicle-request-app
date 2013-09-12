<?php

namespace Panda86\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Panda86\UserBundle\Entity\User;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function indexAction()
    {
        $repository = $this->getDoctrine()
            ->getRepository('Panda86UserBundle:User');

        $query = $repository->createQueryBuilder('u')
            ->select('u.id, u.username, u.first_name, u.last_name, u.email')
            ->orderBy('u.username', 'ASC')
            ->getQuery();

        $users = $query->getResult();
        if (!$users) {            
            throw $this->createNotFoundException(
                'No users found :o'
            );
        }
        return $this->render('Panda86UserBundle:User:index.html.twig', array(
            'entities' => $users
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
