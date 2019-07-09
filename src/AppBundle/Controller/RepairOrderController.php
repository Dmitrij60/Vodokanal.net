<?php


namespace AppBundle\Controller;


use AppBundle\Form\RepairOrderType;
use Symfony\Component\Routing\Annotation\Route;

class RepairOrderController extends ApplicationController
{
    public function indexAction()
    {

    }

    /**
     * @Route("repair_order", name="repair_order")
     */
    public function orderAction()
    {
        $form = $this->createForm(RepairOrderType::class);

        return $this->render('@App/repair/order.html.twig', [
            'orderForm' => $form->createView()
        ]);

    }

}