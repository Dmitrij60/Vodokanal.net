<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cartridge;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CartridgeController extends Controller
{
    /**
     * @Route("/cartridge", name="cartridge_list")
     */
    public function indexAction()
    {
        $cartridges = $this
            ->getDoctrine()
            ->getRepository('AppBundle:Cartridge')
            ->findAll();

        $cartridgesExist = $this
            ->getDoctrine()
            ->getRepository('AppBundle:Cartridge')
            ->findExistCartridge();

        return $this->render('@App/cartridges/index.html.twig', [
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
       /* $cartridge = $this->getDoctrine()->getRepository('AppBundle:Cartridge')->find($id);

        if(!$cartridge){
            throw $this->createNotFoundException('Cartridge not found');
        }*/

        return $this->render('@App/cartridges/show.html.twig',[
            'cartridge' => $cartridge
        ]);

    }

}
