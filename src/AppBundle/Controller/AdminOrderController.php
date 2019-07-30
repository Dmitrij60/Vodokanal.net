<?php


namespace AppBundle\Controller;


use AppBundle\Entity\CartridgeOrder;
use AppBundle\Form\CartridgeOrderType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Column\BlankColumn;
use APY\DataGridBundle\Grid\Column\ActionsColumn;
use APY\DataGridBundle\Grid\Column\JoinColumn;

class  AdminOrderController extends ApplicationController
{
    /**
     * @Route("/closed_cartridge_order_status/{id}", name="closed_cartridge_order")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function orderClosedStatusAction($id, Request $request)
    {

        if(isset($_POST['login']) && isset($_POST['password'])) {

            $login = $_POST['login'];
            $password = $_POST['password'];
            $who = $_POST['who'];
            echo "Ваш логин: $login  Ваш пароль: $password кто забрал $who";
        }

        return $this->render('@App/admin/edit.html.twig');


        /*$em = $this->getDoctrine()->getManager();
        $order = $em->getRepository(CartridgeOrder::class)->find($id);
        if (!$order) {
            throw $this->createNotFoundException(
                'No order found for id '.$id
            );
        }
        $order->setStatus('Заявка отменена');
        $em->flush();
        return $this->redirectToRoute('admin_cartridgeOrder', [
            'id' => $order->getId()
        ]);*/
    }

    /**
     * @Route("/confirm_cartridge_order_status/{id}", name="confirm_cartridge_order")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function orderConfirmStatusAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $order = $em->getRepository(CartridgeOrder::class)->find($id);
        if (!$order) {
            throw $this->createNotFoundException(
                'No order found for id '.$id
            );
        }
        $order->setStatus('Заявка выполнена');
        $em->flush();
        return $this->redirectToRoute('admin_cartridgeOrder', [
            'id' => $order->getId()
        ]);
    }

    /**
     * @Route("/plus_cartridge_order_status/{id}", name="plus_cartridge_order")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function orderPlusCartridgeAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $order = $em->getRepository(CartridgeOrder::class)->find($id);
        if (!$order) {
            throw $this->createNotFoundException(
                'No order found for id '.$id
            );
        }
        $count = $order->getIssued();
        $count = (int)$count;
        $count = $count + 1;

        $order->setIssued($count);
        $em->flush();
        return $this->redirectToRoute('admin_cartridgeOrder', [
            'id' => $order->getId()
        ]);
    }

    /**
     * @Route("/minus_cartridge_order_status/{id}", name="minus_cartridge_order")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function orderMinusCartridgeAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $order = $em->getRepository(CartridgeOrder::class)->find($id);
        if (!$order) {
            throw $this->createNotFoundException(
                'No order found for id '.$id
            );
        }
        $count = $order->getIssued();
        $count = (int)$count;
        $count = $count - 1;

        $order->setIssued($count);
        $em->flush();
        return $this->redirectToRoute('admin_cartridgeOrder', [
            'id' => $order->getId()
        ]);
    }


}