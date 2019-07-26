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
            $this->addFlash('success', 'Заявка добавлена');
            //Редирект
           return $this->redirectToRoute('service_list');
        }

        return $this->render('@App/cartridges/order.html.twig',[
            'orderForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/edit_cartridge_order_status/{id}", name="edit_cartridge_order")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function orderStatusAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $order = $em->getRepository(CartridgeOrder::class)->find($id);

        if (!$order) {
            throw $this->createNotFoundException(
                'No order found for id '.$id
            );
        }

        $order->setStatus('Заявка закрыта');
        $em->flush();

        return $this->redirectToRoute('admin_cartridgeOrder', [
            'id' => $order->getId()
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

        return $this->render('@App/cartridges/edit.html.twig',[
            'orderForm' => $form->createView()
        ]);

    }*/


}