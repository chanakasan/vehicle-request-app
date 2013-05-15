<?php

namespace Panda86\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Panda86\UserBundle\Entity\User;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function indexAction()
    {
        $users = $this->getDoctrine()
            ->getRepository('Panda86UserBundle:User')
            ->findAll();

        if (!$users) {            
            throw $this->createNotFoundException(
                'No users found :o'
            );
        }
        echo "<pre>";
        print_r($users);
        echo "</pre>";

        return $this->render('Panda86UserBundle:User:index.html.twig');
    }

    public function showAction($id)
    {
        $user = $this->getDoctrine()
            ->getRepository('Panda86UserBundle:User')
            ->find($id);

        if (!$user) {
            throw $this->createNotFoundException(
                'No user id found '.$id
            );
        }
        echo "<pre>";
        print_r($user);
        echo "</pre>";

        return $this->render('Panda86UserBundle:User:show.html.twig');
    }

    public function createAction()
    {
        $user = new User();
        $user->setFirstName("Nimal");
        $user->setLastName("Perera");
        $user->setUsername("panda86");
        $user->setPassword("pass123");
        $user->setSalt("ubuntu");
        $user->setEmail("");
        $user->setIsAdmin(true);
        $user->setIsManager(false);

        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        return new Response('Created user id '.$user->getId());
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
