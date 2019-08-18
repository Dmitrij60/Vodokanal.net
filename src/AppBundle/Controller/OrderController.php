<?php

namespace AppBundle\Controller;

use AppBundle\Form\AvtoOrderType;
use AppBundle\Form\CartridgeOrderType;
use AppBundle\Form\ConsultationOrderType;
use AppBundle\Form\DepartureOrderType;
use AppBundle\Form\ImproveType;
use AppBundle\Form\RepairOrderType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class OrderController extends ApplicationController
{
    /**
     * @Route("/avto_order", name="avto_order")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function orderAvtoAction(Request $request)
    {
        $template = $this->roleWithTemplate();

        $form = $this->createForm(AvtoOrderType::class);
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
           return $this->redirectToRoute('avto_order');
        }

        return $this->render('@App/avto/order.html.twig',[
            'orderForm' => $form->createView(),
            'template' => $template
        ]);
    }

    /**
     * @Route("/cartridge_order", name="cartridge_order")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function orderCartridgeAction(Request $request)
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

    /**
     * @Route("consultation_order", name="consultation_order")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function orderConsultationAction(Request $request)
    {
        $template = $this->roleWithTemplate();

        $form = $this->createForm(ConsultationOrderType::class);
        $form->add('Добавить заявку', SubmitType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $order = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($order);
            $em->flush();
            $this->addFlash('success', 'Заявка добавлена');
            return $this->redirectToRoute('consultation_order');
        }
        return $this->render('@App/consultation/order.html.twig', [
            'orderForm' => $form->createView(),
            'template' => $template,
        ]);
    }

    /**
     * @Route("departure_order", name="departure_order")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function orderDepartureAction(Request $request)
    {
        $template = $this->roleWithTemplate();

        $form = $this->createForm(DepartureOrderType::class);
        $form->add('Отправить заявку', SubmitType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $order = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($order);
            $em->flush();
            $this->addFlash('success', 'Заявка добавлена');
            return $this->redirectToRoute('departure_order');
        }
        return $this->render('@App/departure/order.html.twig', [
            'orderForm' => $form->createView(),
            'template' => $template
        ]);
    }

    /**
     * @Route("repair_order", name="repair_order")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function orderRepairAction(Request $request)
    {
        $template = $this->roleWithTemplate();

        $form = $this->createForm(RepairOrderType::class);
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
            return $this->redirectToRoute('repair_order');
        }

        return $this->render('@App/repair/order.html.twig', [
            'orderForm' => $form->createView(),
            'template' => $template
        ]);
    }

    /**
     * @Route("improve", name="improve")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function orderImproveAction(Request $request)
    {
        $template = $this->roleWithTemplate();

        $form = $this->createForm(ImproveType::class);
        $form->add('Отправить заявку', SubmitType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $order = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($order);
            $em->flush();
            $this->addFlash('success', 'Заявка добавлена');
            return $this->redirectToRoute('improve');
        }
        return $this->render('@App/improve/index.html.twig', [
            'orderForm' => $form->createView(),
            'template' => $template
        ]);
    }
}