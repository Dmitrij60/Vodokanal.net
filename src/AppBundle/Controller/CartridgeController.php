<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cartridge;
use AppBundle\Entity\Printer;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CartridgeController extends ApplicationController
{
    /**
     * @Route("/cartridge", name="cartridge_list")
     */
    public function indexAction()
    {
        $template = $this->roleWithTemplate();

        $cartridges = $this
            ->getDoctrine()
            ->getRepository('AppBundle:Cartridge')
            ->findAll();

        $cartridgesExist = $this
            ->getDoctrine()
            ->getRepository('AppBundle:Cartridge')
            ->findExistCartridge();

        return $this->render('@App/cartridges/index.html.twig', [
            'template' => $template,
            'cartridges' => $cartridges,
            'cartridgesExist' => $cartridgesExist
        ]);
    }

    /**
     * @Route("/cartridge/{id}", name="cartridge_item", requirements={"id": "[0-9]+"})
     * @param Cartridge $cartridge
     * @return Response
     */
    public function showAction(Cartridge $cartridge)
    {
        $template = $this->roleWithTemplate();



        $printers = $this->getDoctrine()->getRepository('AppBundle:Printer')->findByCartridgeId($cartridge);
        /*dump($printers);
        die;*/
       // $cartridge = $this->getDoctrine()->getRepository('AppBundle:Cartridge')->find($id);

        /*if(!$cartridge){
            throw $this->createNotFoundException('Cartridge not found');
        }*/

        return $this->render('@App/cartridges/show.html.twig',[
            'template' => $template,
            'cartridge' => $cartridge,
            'printers' => $printers
        ]);

    }

}
