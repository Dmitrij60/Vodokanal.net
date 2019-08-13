<?php


namespace AppBundle\Controller;


use AppBundle\Entity\CartridgeOrder;
use AppBundle\Form\CartridgeOrderType;
use AppBundle\Form\EditCartridgeOrderType;
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
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
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
            $A = $_SERVER['AUTH_USER'];

            $this->addFlash('success', 'Заявка добавлена'.$A);
            //Редирект
           return $this->redirectToRoute('cartridge_order');
        }

        return $this->render('@App/cartridges/order.html.twig',[
            'orderForm' => $form->createView(),
        ]);
    }

    /*public function orderStatusAction(Request $request)
    {
        $form = $this->createForm(EditCartridgeOrderType::class);
        $form->add('Отправить заявку', SubmitType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $order = $form->getData();
            //Сохранение сущности в бд
            $em = $this->getDoctrine()->getManager();
            $em->persist($order);
            $em->flush();
            $this->addFlash('success', 'Статус заявки изменен');
            //Редирект
            return $this->redirectToRoute('admin_cartridgeOrder');
        }

        return $this->render('@App/cartridges/editCartridge.html.twig',[
            'orderForm' => $form->createView()
        ]);

    }*/


}