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
            ->select('u.id, u.username')
            ->orderBy('u.username', 'ASC')
            ->getQuery();

        $users = $query->getResult();
        if (!$users) {            
            throw $this->createNotFoundException(
                'No users found :o'
            );
        }
        return new Response(json_encode($users));
    }

    public function showAction($id)
    {
        $repository = $this->getDoctrine()
            ->getRepository('Panda86UserBundle:User');

        $query = $repository->createQueryBuilder('u')
            ->select('u.id, u.username')
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

    public function createAction()
    {
        $em = $this->getDoctrine()->getManager();
        for($i=0; $i < 10; $i++)
        {
            $user = new User();
            $user->setFirstName("John0".$i);
            $user->setLastName("Doe0".$i);
            $user->setUsername("panda0".$i);
            $user->setPassword("pass123");
            //$user->setSalt("ubuntu");
            $user->setEmail("john".$i."@gmail.com");
            $user->setIsAdmin(true);
            $user->setIsManager(false);
            $em->persist($user);
            $em->flush();
        }
        //$this->get('session')->getFlashBag()->add('notice', 'Created user id '.$user->getId());
        return $this->redirect($this->generateUrl('user_index'));
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
