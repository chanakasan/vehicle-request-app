<?php

namespace Panda86\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\DateTime;

class ReportController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('Panda86AppBundle:Report')->findCostForCabs();

        return $this->render('Panda86AppBundle:Report:index.html.twig', array(
            'results' => $entities
        ));
    }

    public function generateAction(Request $request)
    {
        $f = $request->query->get('date_from');
        $t = $request->query->get('date_to');

        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('Panda86AppBundle:Report')->findCostForCabs($f, $t);

        return $this->render('Panda86AppBundle:Report:index.html.twig', array(
            'results' => $entities
        ));

        $filename = 'report_'.date("YmdHis").'.xls';
        $content = $this->render(
            'Panda86AppBundle:Report:cabs.xml.twig', array(
            'entities' => $entities,
            'report_time' => new \DateTime('now')
        ));

        $response = new Response();
        $response->headers->set('Content-Type', 'application/xls');
        $response->headers->set('Content-Disposition', 'attachment;filename="'.$filename);

        $response->setContent($content);
        return $response;
    }

}
