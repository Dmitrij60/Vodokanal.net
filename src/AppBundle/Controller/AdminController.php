<?php


namespace AppBundle\Controller;


use Symfony\Component\Routing\Annotation\Route;

class AdminController extends ApplicationController
{

    /**
     * @Route("/admin", name="admin")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $param = 'hello admin';

        return $this->render('@App/admin/index.html.twig', [
           'param' => $param,
        ]);
    }

}