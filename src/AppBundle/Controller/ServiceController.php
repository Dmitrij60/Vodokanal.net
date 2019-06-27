<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ServiceController extends Controller
{
    /**
     * @Route("/service", name="service_list" )
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $services = [
            '0' => 'Cartridges',
            '1' => 'Repair',
            '2' => 'Consultation'
        ];
        return  ['services' => $services];
    }
    /**
     * @Route("/service/{id}", name="service_item", requirements={"id": "[0-9]+"})
     * @param $id
     * @return Response
     */
    public function showAction($id)
    {
        $services = [
            '0' => 'Cartridges',
            '1' => 'Repair',
            '2' => 'Consultation'
        ];
        return $this->render('@App/service/show.html.twig',[
            'id' => $id,
            'service' => $services[$id]
        ]);
    }

}
