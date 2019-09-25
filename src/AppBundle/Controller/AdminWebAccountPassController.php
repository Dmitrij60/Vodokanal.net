<?php
namespace AppBundle\Controller;

use AppBundle\Entity\SrvPass;
use AppBundle\Entity\WebAccountsPass;
use AppBundle\Form\SrvPassType;
use AppBundle\Form\WebAccountsPassType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;



class  AdminWebAccountPassController extends ApplicationController
{
    /**
     * @Route("/webaccount/pass/row/edit/{id}", name="edit_webaccountpass_row")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function webAccountPassEditRowAction($id)
    {
        $template = $this->roleWithTemplate();

        $em = $this->getDoctrine()->getManager();
        $row = $em->getRepository(WebAccountsPass::class)->find($id);

        $title = $row->getTitle();
        $url = $row->getUrl();
        $login = $row->getLogin();
        $pass = $row->getPass();
        $comm = $row->getComm();

        if(isset($_POST['title']) || isset($_POST['login']) || isset($_POST['pass']) || isset($_POST['url']) || isset($_POST['comm']) ){
            $title = $_POST['title'];
            $url = $_POST['url'];
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
            $row->setUrl($url);
            $row->setLogin($login);
            $row->setPass($pass);
            $row->setComm($comm);
            $em->flush();
            $this->addFlash('success', 'Запись изменена');
            return $this->redirectToRoute('admin_WebAccountsPass');
        }
        return $this->render('@App/admin/editWebAccPass.html.twig', [
            'template' => $template,
            'id' => $id,
            'title' => $title,
            'url' => $url,
            'login' => $login,
            'pass' => $pass,
            'comm' => $comm,
        ]);
    }

    /**
     * @Route("/webaccount/pass/row/add", name="add_webaccountpass_row")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function addWebAccountPassRowAction(Request $request)
    {
        $template = $this->roleWithTemplate();

        $form = $this->createForm(WebAccountsPassType::class);
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
            return $this->redirectToRoute('admin_WebAccountsPass');
        }

        return $this->render('@App/admin/addRowWebAccountPass.html.twig',[
            'orderForm' => $form->createView(),
            'template' => $template
        ]);
    }
}