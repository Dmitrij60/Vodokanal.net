<?php
namespace AppBundle\Controller;
use AppBundle\Entity\Cartridge;
use AppBundle\Entity\Printer;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
class PrinterController extends ApplicationController
{
    /**
     * @Route("/printer", name="printer_list")
     */
    public function indexAction()
    {
        $printers = $this
            ->getDoctrine()
            ->getRepository('AppBundle:Printer')
            ->findAll();
        $printersExist = $this
            ->getDoctrine()
            ->getRepository('AppBundle:Printer');
        //->findExistCartridge();
        return $this->render('@App/printers/index.html.twig', [
            'printers' => $printers,
            'printersExist' => $printersExist
        ]);
    }
    /**
     * @Route("/printer/{id}", name="printer_item", requirements={"id": "[0-9]+"})
     * @param Printer $printer
     * @return Response
     */
    public function showAction(Printer $printer)
    {
        //$printer = $this->getDoctrine()->getRepository('AppBundle:Cartridge')->find($id);
        //if(!$printer){
        //     throw $this->createNotFoundException('Printer not found');
        // }
        return $this->render('@App/printers/show.html.twig',[
            'printer' => $printer
        ]);
    }
}