<?php


namespace AppBundle\Controller;


use AppBundle\Form\CartridgeOrderType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CartridgeOrderController extends ApplicationController
{
    public function indexAction()
    {

    }

    /**
     * @Route("/cartridge_order", name="cartridge_order")
     */
    public function orderAction(Request $request)
    {
        $form = $this->createForm(CartridgeOrderType::class);
        $form->add('Отправить заявку', SubmitType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $order = $form->getData();
            //Сохранение сущности в бд
            $em = $this->getDoctrine()->getManager();
            $em->persist($order);
            $em->flush();
            $this->addFlash('success', 'Заявка добавлена');
            //Редирект
           return $this->redirectToRoute('service_list');
        }

        return $this->render('@App/cartridges/order.html.twig',[
            'orderForm' => $form->createView()
        ]);

    }


}