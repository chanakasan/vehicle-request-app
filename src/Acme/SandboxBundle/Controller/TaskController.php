<?php

namespace Acme\SandboxBundle\Controller;

use Acme\SandboxBundle\Entity\Task;
use Acme\SandboxBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller {

    public function indexAction()
    {
        return new Response("Welcome! to your Task Management App");
    }

    public function createAction()
    {
        $category = new Category();
        $category->setName('Main Tasks');

        $task = new Task();
        $task->setName('Download songs');
        // relate this Task to the category
        $task->setCategory($category);

        $em = $this->getDoctrine()->getManager();
        $em->persist($category);
        $em->persist($task);
        $em->flush();

        return new Response(
            'Created task id: '.$task->getId().' and category id: '.$category->getId()
        );
    }

}