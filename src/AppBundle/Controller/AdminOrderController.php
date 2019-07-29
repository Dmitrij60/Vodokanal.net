<?php


namespace AppBundle\Controller;


use AppBundle\Entity\CartridgeOrder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Column\BlankColumn;
use APY\DataGridBundle\Grid\Column\ActionsColumn;
use APY\DataGridBundle\Grid\Column\JoinColumn;
use \Doctrine\DBAL\Driver\PDOMySql;
use \PDO;

class  AdminOrderController extends ApplicationController
{
    /**
     * @Route("/closed_cartridge_order_status/{id}", name="closed_cartridge_order")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function orderClosedStatusAction($id)
    {

        if(isset($_POST['status']) && isset($_POST['issued']) && isset($_POST['id'])){

            $login=$_POST['status'];
            $password = $_POST['issued'];
            $id = $_POST['id'];

            $products = $this->getDoctrine()
                ->getRepository(CartridgeOrder::class);
            ->findAllGreaterThanPrice($login);


            /*echo "Ваш логин: $login <br> Ваш пароль: $password and $id";*/
        }


        return $this->render('@App/admin/edit.html.twig', [
            'id' => $id
        ]);


       /* $em = $this->getDoctrine()->getManager();
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