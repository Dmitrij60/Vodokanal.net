<?php


namespace AppBundle\Controller;


use Symfony\Component\Routing\Annotation\Route;
use APY\DataGridBundle\Grid\Source\Entity;

class AdminController extends ApplicationController
{

    /**
     * @Route("/admin", name="admin_home")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $param = 'hello admin';

        return $this->render('@App/admin/index.html.twig', [
           'param' => $param,
        ]);
    }

    /**
     * @Route("/admin_grid", name="admin_grid")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function gridAction()
    {
        dump($this->container);
        die;
        // Creates a simple grid based on your entity (ORM)
        $source = new Entity('AppBundle:MyEntity');

        // Get a Grid instance
        $grid = $this->get('grid');

        // Attach the source to the grid
        $grid->setSource($source);

        // OR with only one value
        $grid->setLimits(5);

        // Return the response of the grid to the template
        return $grid->getGridResponse('@App/admin/grid.html.twig');
    }

    /**
     * @Route("/admin_cartridgeOrder", name="admin_cartridgeOrder")
     */
    public function gridCartridgeOrderAction()
    {
        // Creates a simple grid based on your entity (ORM)
        $source = new Entity('AppBundle:CartridgeOrder');

        // Get a Grid instance
        $grid = $this->get('grid');

        // Attach the source to the grid
        $grid->setSource($source);

        // OR with only one value
        $grid->setLimits(array(5 => 'по пять', 10 => 'по десять', 15 => 'по пятнадцать'));

        // Return the response of the grid to the template
        return $grid->getGridResponse('@App/admin/grid.html.twig');
    }

    /**
     * @Route("/adminRepairOrder", name="admin_repairOrder")
     */
    public function gridRepairOrderAction()
    {
        // Creates a simple grid based on your entity (ORM)
        $source = new Entity('AppBundle:RepairOrder');

        // Get a Grid instance
        $grid = $this->get('grid');

        // Attach the source to the grid
        $grid->setSource($source);


        // Return the response of the grid to the template
        return $grid->getGridResponse('@App/admin/grid.html.twig');
    }

    /**
     * @Route("/adminDepartureOrder", name="admin_departureOrder")
     */
    public function gridDepartureOrderAction()
    {
        // Creates a simple grid based on your entity (ORM)
        $source = new Entity('AppBundle:DepartureOrder');

        // Get a Grid instance
        $grid = $this->get('grid');

        // Attach the source to the grid
        $grid->setSource($source);


        // Return the response of the grid to the template
        return $grid->getGridResponse('@App/admin/grid.html.twig');
    }

    /**
     * @Route("/adminConsultationOrder", name="admin_consultationOrder")
     */
    public function gridConsultationOrderAction()
    {
        // Creates a simple grid based on your entity (ORM)
        $source = new Entity('AppBundle:ConsultationOrder');

        // Get a Grid instance
        $grid = $this->get('grid');

        // Attach the source to the grid
        $grid->setSource($source);


        // Return the response of the grid to the template
        return $grid->getGridResponse('@App/admin/grid.html.twig');
    }

}