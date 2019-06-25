<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $param = 'And this World!!!';
        $arr = [1, 2, 3];
        $val = true;
        $val2 = false;
        return $this->render('@App/default/index.html.twig',[
            'array' => $arr,
            'value' => $val,
            'value2' => $val2,
            'param' => $param
        ]);
    }

    /**
     * @Route("/feedback", name="feedback")
     */
    public function feedbackAction()
    {
        return $this->render('@App/default/feedback.html.twig');
    }
}
