<?php
namespace AppBundle\Controller;

use AppBundle\Entity\AvtoOrder;
use AppBundle\Entity\ConsultationOrder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Column\BlankColumn;
use APY\DataGridBundle\Grid\Column\ActionsColumn;
use APY\DataGridBundle\Grid\Column\JoinColumn;

class  AdminAvtoController extends ApplicationController
{
    /**
     * @Route("/adminAvtoOrder", name="admin_AvtoOrder")
     */
    public function gridAvtoOrderAction()
    {
        $text = 'Заявки на транспорт';
        // Creates a simple grid based on your entity (ORM)
        $source = new Entity('AppBundle:AvtoOrder');

        // Get a Grid instance
        $grid = $this->get('grid');

        // Attach the source to the grid
        $grid->setSource($source);

        $grid->setDefaultOrder('id', 'desc');

        $grid->setLimits(array(5 => 'по пять', 10 => 'по десять', 15 => 'по пятнадцать'));

        $responsible = new ActionsColumn('action3', 'изменить статус');
        $grid->addColumn($responsible, 10);

        $editTitle = 'изменить статус';
        $editRoute = 'edit_avto_order';
        $rowEditAction = new RowAction($editTitle, $editRoute);
        $rowEditAction->setColumn('action3');
        $rowEditAction -> setRouteParameters ( array ('id'));
        $grid->addRowAction($rowEditAction);

        // Return the response of the grid to the template
        return $grid->getGridResponse('@App/avto/grid.html.twig', [
            'param' => $text,
        ]);
    }

    /**
     * @Route("/edit_avto_order_status/{id}", name="edit_avto_order")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function orderEditAvtoStatusAction($id)
    {
        $template = $this->roleWithTemplate();

        $em = $this->getDoctrine()->getManager();
        $edit = $em->getRepository(AvtoOrder::class)->find($id);
        $district = $edit->getDistrict();
        $sender = $edit->getSender();
        $created = $edit->getCreated();
        $status = $edit->getStatus();
        $responsible = $edit->getDriver();


        if (isset($_POST['status']) && isset($_POST['id']) && isset($_POST['driver'])) {
            $status = $_POST['status'];
            $driver = $_POST['driver'];
            $id = $_POST['id'];

            if (!$edit) {
                throw $this->createNotFoundException(
                    'No order found for id ' . $id
                );
            }

            $edit->setStatus($status);
            $edit->setDriver($driver);
            $em->flush();
            $this->addFlash('success', 'Статус заявки изменен');
            return $this->redirectToRoute('admin_AvtoOrder');
        }
        return $this->render('@App/avto/editAvto.html.twig', [
            'template' => $template,
            'id' => $id,
            'district' => $district,
            'created' => $created,
            'status' => $status,
            'sender' => $sender,
        ]);
    }

    /**
     * @Route("/avto_handBook", name="avto_handbook")
     */
    public function gridHandBookAction()
    {
        $text = 'Справочник по АУП';
        // Creates a simple grid based on your entity (ORM)
        $source = new Entity('AppBundle:HandBook');

        // Get a Grid instance
        $grid = $this->get('grid');

        // Attach the source to the grid
        $grid->setSource($source);

        $grid->setDefaultOrder('department', 'desc');

        // OR with only one value
        $grid->setLimits(array(5 => 'по пять', 10 => 'по десять', 15 => 'по пятнадцать'));

        // Return the response of the grid to the template
        return $grid->getGridResponse('@App/avto/grid.html.twig', [
            'param' => $text,
        ]);
    }


}