<?php


namespace AppBundle\Controller;


use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Column\ActionsColumn;
use APY\DataGridBundle\Grid\Source\Entity;
use AppBundle\Form\AvtoOrderType;
use Symfony\Component\Routing\Annotation\Route;
use APY\DataGridBundle\Grid\Column\JoinColumn;

class AUPGridController extends ApplicationController
{
    /**
     * @Route("/aup_avtoOrder", name="aup_avtoOrder")
     */
    public function gridCartridgeOrderAction()
    {
        $text = 'Заявки на картриджи';
        // Creates a simple grid based on your entity (ORM)
        $source = new Entity('AppBundle:AvtoOrder');

        // Get a Grid instance
        $grid = $this->get('grid');

        // Attach the source to the grid
        $grid->setSource($source);

        $grid->setDefaultOrder('id', 'desc');

        // OR with only one value
        $grid->setLimits(array(5 => 'по пять', 10 => 'по десять', 15 => 'по пятнадцать'));

        /*$actions2Column = new ActionsColumn('action2', 'изменить статус');
        $grid->addColumn($actions2Column, 10);

        $editTitle = 'Изменить статус заявки';
        $editRoute = 'edit_cartridge_order';
        $rowEditAction = new RowAction($editTitle, $editRoute);
        $rowEditAction->setColumn('action2');
        $rowEditAction -> setRouteParameters ( array ('id'));
        $grid->addRowAction($rowEditAction);*/


        // Return the response of the grid to the template
        return $grid->getGridResponse('@App/aup/grid.html.twig', [
            'param' => $text,
        ]);
    }


}