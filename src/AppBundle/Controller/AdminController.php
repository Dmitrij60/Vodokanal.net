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
     */
    public function gridAction()
    {
        // Creates a simple grid based on your entity (ORM)
        $source = new Entity('AppBundle:MyEntity');

        // Get a Grid instance
        $grid = $this->get('grid');

        // Attach the source to the grid
        $grid->setSource($source);

        // Return the response of the grid to the template
        return $grid->getGridResponse('@App/admin/grid.html.twig');
    }

}