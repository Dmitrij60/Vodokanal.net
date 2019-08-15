<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends ApplicationController
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $cartridges = $this->getDoctrine()->getRepository('AppBundle:Cartridge')->findAll();

        return $this->render('@App/default/index.html.twig', [
            'cartridges' => $cartridges
        ]);
    }

    /**
     * @Route("/pageAdm", name="homepageAdm")
     */
    public function indexAdmAction(Request $request)
    {
        $cartridges = $this->getDoctrine()->getRepository('AppBundle:Cartridge')->findAll();

        return $this->render('@App/default/indexAdm.html.twig', [
            'cartridges' => $cartridges
        ]);
    }

    /**
     * @Route("/pageUsr", name="homepageUsr")
     */
    public function indexUsrAction(Request $request)
    {
        $cartridges = $this->getDoctrine()->getRepository('AppBundle:Cartridge')->findAll();

        return $this->render('@App/default/indexUsr.html.twig', [
            'cartridges' => $cartridges
        ]);
    }

    /**
     * @Route("/pageAup", name="homepageAup")
     */
    public function indexAupAction(Request $request)
    {
        $cartridges = $this->getDoctrine()->getRepository('AppBundle:Cartridge')->findAll();

        return $this->render('@App/default/indexAup.html.twig', [
            'cartridges' => $cartridges
        ]);
    }
}
