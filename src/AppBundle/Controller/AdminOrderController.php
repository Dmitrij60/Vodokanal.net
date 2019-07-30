<?php
namespace AppBundle\Controller;
use AppBundle\Entity\CartridgeOrder;
use AppBundle\Entity\ConsultationOrder;
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
     * @Route("/edit_cartridge_order_status/{id}", name="edit_cartridge_order")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function orderEditCartridgeStatusAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $status = $em->getRepository(CartridgeOrder::class)->find($id);
        $cartridgeModel = $status->getCartridgeModel();
        $district = $status->getDistrict();
        $department = $status->getDepartment();
        $count = $status->getCount();

        $A = gethostbyaddr($_SERVER['REMOTE_ADDR']);//TODO:remote addr

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

    /**
     * @Route("/edit_consultation_order_status/{id}", name="edit_consultation_order")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function orderEditConsultationStatusAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $status = $em->getRepository(ConsultationOrder::class)->find($id);
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

    /**
     * @Route("/edit_consultation_order_responsible/{id}", name="edit_responsible_consultation_order")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function orderEditConsultationResponsibleAction($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $responsible = $entityManager->getRepository(ConsultationOrder::class)->find($id);

        if (!$responsible) {
            throw $this->createNotFoundException(
                'No consultation found for id '.$id
            );
        }
        $param = $responsible->getResponsible();
        if($param == !null){
            $this->addFlash('success','Вы не можете принять заявку, ее принял другой сотрудник');
        }else {
            $user = $this->getUser();
            $responsible->setResponsible($user);
            $entityManager->flush();
            $this->addFlash('success','Вы приняли заявку');
        }

        return $this->redirectToRoute('admin_consultationOrder', [
            'id' => $responsible->getId()
        ]);
    }


}