<?php


namespace AppBundle\Controller;


use AppBundle\Form\RepairOrderType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RepairOrderController extends ApplicationController
{
    public function indexAction()
    {

    }

    /**
     * @Route("repair_order", name="repair_order")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function orderAction(Request $request)
    {
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
            'orderForm' => $form->createView()
        ]);

    }

}