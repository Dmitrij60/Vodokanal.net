<?php
namespace AppBundle\Controller;

use AppBundle\Form\AvtoOrderType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;



class  AdminSendOrderController extends ApplicationController
{
    /**
     * @Route("/admin_avto_order", name="admin_avto_order")
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
}