<?php


namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bridge\Twig\AppVariable;

class ApplicationController extends Controller
{
    public function roleWithTemplate()
    {
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $username = $user->getRoles();
        $role = $username[0];

        switch ($role) {
            case 'ROLE_AVTO':
                $template = '@App/layoutAdminAvto.html.twig';
                return $template;
                break;
            case 'ROLE_ADMIN':
                $template = '@App/layoutAdmin.html.twig';
                return $template;
                break;
            case 'ROLE_USER':
                $template = '@App/layoutUser.html.twig';
                return $template;
                break;
            case 'ROLE_AUP':
                $template = '@App/layoutAup.html.twig';
                return $template;
                break;
        }
    }

}