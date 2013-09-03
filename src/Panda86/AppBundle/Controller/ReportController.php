<?php

namespace Panda86\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ReportController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $results = $em->getRepository('Panda86AppBundle:Report')->findAll();

        return $this->render('Panda86AppBundle:Report:index.html.twig', array(
            'results' => $results
        ));
    }

    public function downloadcsvAction()
    {
        $filename = 'products.csv';
        $path = $this->get('kernel')->getRootDir(). "/../reports/".$filename;
        $content = file_get_contents($path);

        $response = new Response();

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment;filename="'.$filename);

        $response->setContent($content);
        return $response;
    }

    public function downloadxlsAction()
    {
        $products = $this->_getProducts();
        $filename = 'products.xls';
        $content = $this->render(
            'Panda86AppBundle:Report:excel.xml.twig', array(
            'products' => $products
        ));

        $response = new Response();
        $response->headers->set('Content-Type', 'application/xls');
        $response->headers->set('Content-Disposition', 'attachment;filename="'.$filename);

        $response->setContent($content);
        return $response;
    }

    private function _getProducts()
    {
        $products = array();
        for($i=0; $i<10; $i++)
        {
            $product = new \StdClass();
            $product->id = $i;
            $product->name = 'Product '.$i;
            $time = mktime(0,0,0,date("m"),date("d")-2*$i,date("Y"));
            $product->released_on = date("Y/m/d", $time);
            $product->price = 32.50+$i;
            $products[] = $product;
        }

        return $products;
    }
}
