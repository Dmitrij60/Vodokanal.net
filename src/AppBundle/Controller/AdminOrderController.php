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
     * @Route("/edit_cartridge_order_status/{id}", name="edit_cartridge_order")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function orderClosedStatusAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $status = $em->getRepository(CartridgeOrder::class)->find($id);
        $cartridgeModel = $status->getCartridgeModel();
        $district = $status->getDistrict();
        $department = $status->getDepartment();
        $count = $status->getCount();


        if(isset($_POST['who']) && isset($_POST['issued']) && isset($_POST['id'])){
            $who=$_POST['who'];
            $issued = $_POST['issued'];
            $id = $_POST['id'];

            if (!$status) {
                throw $this->createNotFoundException(
                    'No order found for id '.$id
                );
            }
            $status->setIssued($issued);
            $status->setWho($who);
            $em->flush();
            $this->addFlash('success', 'Статус заявки изменен');
            return $this->redirectToRoute('admin_cartridgeOrder');
        }

        return $this->render('@App/admin/edit.html.twig', [
            'id' => $id,
            'cartridgeModel' => $cartridgeModel,
            'district' => $district,
            'department' => $department,
            'count' => $count,
        ]);
    }
}