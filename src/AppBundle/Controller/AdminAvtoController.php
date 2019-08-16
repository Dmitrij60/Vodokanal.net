<?php
namespace AppBundle\Controller;

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

        $responsible = new ActionsColumn('action2', 'забрать заявку');
        $grid->addColumn($responsible, 9);

        $responsibleTitle = 'взять заявку';
        $responsibleRoute = 'edit_responsible_consultation_order';
        $rowEditAction = new RowAction($responsibleTitle, $responsibleRoute);
        $rowEditAction->setColumn('action2');
        $rowEditAction -> setRouteParameters ( array ('id'));
        $grid->addRowAction($rowEditAction);

        $responsible = new ActionsColumn('action3', 'изменить статус');
        $grid->addColumn($responsible, 10);

        $editTitle = 'изменить статус';
        $editRoute = 'edit_consultation_order';
        $rowEditAction = new RowAction($editTitle, $editRoute);
        $rowEditAction->setColumn('action3');
        $rowEditAction -> setRouteParameters ( array ('id'));
        $grid->addRowAction($rowEditAction);

        // Return the response of the grid to the template
        return $grid->getGridResponse('@App/avto/grid.html.twig', [
            'param' => $text
        ]);
    }


}