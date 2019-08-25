<?php


namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\CartridgeOrder;

class AjaxController extends ApplicationController
{
    /**
     * @Route("/ajax", name="ajax")
     */
    public function indexAction(Request $request)
    {
        $cartridgesExist = $this
            ->getDoctrine()
            ->getRepository('AppBundle:Cartridge')
            ->countCartridge();

        $departureOrders = $this
            ->getDoctrine()
            ->getRepository('AppBundle:DepartureOrder')
            ->countOrder();

        $repairOrders = $this
            ->getDoctrine()
            ->getRepository('AppBundle:RepairOrder')
            ->countOrder();

        $consulattionOrders = $this
            ->getDoctrine()
            ->getRepository('AppBundle:ConsultationOrder')
            ->countOrder();

        $orders = $cartridgesExist + $departureOrders + $repairOrders + $consulattionOrders;
        $_SESSION['countOrder'] = $orders;


        if($request->request->get('some_var_name')){
            //make something curious, get some unbelieveable data
            $arrData = ['output' => $orders];
            return new JsonResponse($arrData);
        }

        return $this->render('@App/admin/grid.html.twig');

    }

}