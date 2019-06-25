<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ServiceController extends Controller
{
    /**
     * @Route("/service", name="service_list" )
     */
    public function indexAction(Request $request)
    {
        return $this->render('@App/service/index.html.twig');
    }

    /**
     * @Route("", name="")
     */
    public function showAction()
    {
        return $this->render('@App/default/feedback.html.twig');

    }

}
