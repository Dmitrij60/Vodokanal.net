<?php

namespace AppBundle\Controller;

use AppBundle\Form\CartridgeOrderType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use  AppBundle\Security\LoginSuccessHandler;

class CartridgeOrderController extends ApplicationController
{
    /**
     * @Route("/cartridge_order", name="cartridge_order")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function orderAction(Request $request)
    {
        $template = $this->roleWithTemplate();

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
           return $this->redirectToRoute('cartridge_order');
        }

        return $this->render('@App/cartridges/order.html.twig',[

            'orderForm' => $form->createView(),
            'template' => $template
        ]);
    }
}