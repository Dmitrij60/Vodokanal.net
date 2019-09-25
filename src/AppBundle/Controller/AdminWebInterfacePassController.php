<?php
namespace AppBundle\Controller;

use AppBundle\Entity\WebInterfacePass;
use AppBundle\Form\WebInterfacePassType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;



class  AdminWebInterfacePassController extends ApplicationController
{
    /**
     * @Route("/webinterface/pass/row/edit/{id}", name="edit_webinterfacepass_row")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editWebInterfacePassRowAction($id)
    {
        $template = $this->roleWithTemplate();

        $em = $this->getDoctrine()->getManager();
        $row = $em->getRepository(WebInterfacePass::class)->find($id);

        $title = $row->getTitle();
        $ip = $row->getIp();
        $login = $row->getLogin();
        $pass = $row->getPass();
        $comm = $row->getComm();

        if(isset($_POST['title']) || isset($_POST['ip']) || isset($_POST['login']) || isset($_POST['pass']) || isset($_POST['comm']) ){
            $title = $_POST['title'];
            $ip = $_POST['ip'];
            $login = $_POST['login'];
            $pass = $_POST['pass'];
            $comm = $_POST['comm'];

            $id = $_POST['id'];
            if (!$row) {
                throw $this->createNotFoundException(
                    'No order found for id '.$id
                );
            }

            $row->setTitle($title);
            $row->setIp($ip);
            $row->setLogin($login);
            $row->setPass($pass);
            $row->setComm($comm);
            $em->flush();
            $this->addFlash('success', 'Запись изменена');
            return $this->redirectToRoute('admin_WebInterfacesPass');
        }
        return $this->render('@App/admin/editSrvPass.html.twig', [
            'template' => $template,
            'id' => $id,
            'title' => $title,
            'ip' => $ip,
            'login' => $login,
            'pass' => $pass,
            'comm' => $comm,
        ]);
    }

    /**
     * @Route("/webinterface/pass/row/add", name="add_webinterfacepass_row")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function addWebInterfacePassRowAction(Request $request)
    {
        $template = $this->roleWithTemplate();

        $form = $this->createForm(WebInterfacePassType::class);
        $form->add('Добавить запись', SubmitType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $order = $form->getData();
            //Сохранение сущности в бд
            $em = $this->getDoctrine()->getManager();
            $em->persist($order);
            $em->flush();

            $this->addFlash('success', 'Запись добавлена');
            //Редирект
            return $this->redirectToRoute('admin_WebInterfacesPass');
        }

        return $this->render('@App/admin/addRowWebInterfacePass.html.twig',[
            'orderForm' => $form->createView(),
            'template' => $template
        ]);
    }
}