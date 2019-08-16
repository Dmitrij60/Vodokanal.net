<?php


namespace AppBundle\Controller;


use AppBundle\Form\CartridgeOrderType;
use AppBundle\Form\ConsultationOrderType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ConsultationOrderController extends ApplicationController
{
    /**
     * @Route("consultation_order", name="consultation_order")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function orderAction(Request $request)
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
     * @Route("consultation_order2", name="consultation_order2git")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
   /* public function order2Action(Request $request)
    {
        $form = $this->createForm(ConsultationOrderType::class);
        $form->add('Добавить заявку', SubmitType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $order = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($order);
            $em->flush();
            $this->addFlash('success', 'Заявка добавлена');
            return $this->redirectToRoute('service_list');
        }
        return $this->render('@App/consultation/order.html.twig', [
            'orderForm' => $form->createView()
        ]);
    }*/

}