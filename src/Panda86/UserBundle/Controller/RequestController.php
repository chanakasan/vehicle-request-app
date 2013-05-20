<?php

namespace Panda86\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Panda86\UserBundle\Entity\Request as EmpRequest;
use Panda86\UserBundle\Form\Type\RequestType;

class RequestController extends Controller
{
    public function newAction(Request $request)
    {
        $emp_req = new EmpRequest();
        $emp_req->setJourneyType('Single');
        $emp_req->setStartLoc('ICTA');

        $form = $this->createFormBuilder($emp_req)
            ->add('request', 'text')
            ->getForm();

//        $form = $this->createForm(new RequestType(), $emp_req);

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                // perform some action, such as saving the task to the database

                return $this->redirect($this->generateUrl('request_success'));
            }
        }

        return $this->render('Panda86UserBundle:Request:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function indexAction()
    {
        return $this->render('<h1>Vehicle Requests Homepage</h1>',null);
    }

}
