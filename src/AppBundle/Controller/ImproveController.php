<?php


namespace AppBundle\Controller;


use AppBundle\Form\DepartureOrderType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ImproveController extends ApplicationController
{
    public function indexAction()
    {

    }

    /**
     * @Route("improve", name="improve")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function improveAction(Request $request)
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
            return $this->redirectToRoute('service_list');
        }
        return $this->render('@App/improve/index.html.twig', [
            'orderForm' => $form->createView()
        ]);
    }
}