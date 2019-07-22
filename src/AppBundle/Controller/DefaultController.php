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
     * @Route("/", name="homepageUser")
     */
    public function indexUserAction(Request $request)
    {
        $cartridges = $this->getDoctrine()->getRepository('AppBundle:Cartridge')->findAll();

        return $this->render('@App/default/index.html.twig', [
            'cartridges' => $cartridges
        ]);
    }

    /**
     * @Route("/feedback", name="feedback")
     */
    public function feedbackAction()
    {
        return $this->render('@App/default/feedback.html.twig');

    }

}
