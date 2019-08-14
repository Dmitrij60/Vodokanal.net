<?php


namespace AppBundle\Controller;


use AppBundle\Form\DepartureOrderType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DepartureOrderController extends ApplicationController
{
    public function indexAction()
    {

    }

    /**
     * @Route("departure_order", name="departure_order")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function orderAction(Request $request)
    {
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
            'orderForm' => $form->createView()
        ]);
    }
}