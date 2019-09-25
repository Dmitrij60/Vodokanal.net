<?php
namespace AppBundle\Controller;

use AppBundle\Entity\MailPass;
use AppBundle\Entity\SrvPass;
use AppBundle\Form\MailPassType;
use AppBundle\Form\SrvPassType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;



class  AdminMailPassController extends ApplicationController
{
    /**
     * @Route("/mail/pass/row/edit/{id}", name="edit_mailpass_row")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editMailPassRowAction($id)
    {
        $template = $this->roleWithTemplate();

        $em = $this->getDoctrine()->getManager();
        $row = $em->getRepository(MailPass::class)->find($id);

        $email = $row->getEmail();
        $pass = $row->getPass();
        $comm = $row->getComm();

        if(isset($_POST['email']) || isset($_POST['pass']) || isset($_POST['comm'])){
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $comm = $_POST['comm'];
            $id = $_POST['id'];
            if (!$row) {
                throw $this->createNotFoundException(
                    'No order found for id '.$id
                );
            }

            $row->setEmail($email);
            $row->setPass($pass);
            $row->setComm($comm);
            $em->flush();
            $this->addFlash('success', 'Запись изменена');
            return $this->redirectToRoute('admin_MailPass');
        }
        return $this->render('@App/admin/editMailPass.html.twig', [
            'template' => $template,
            'id' => $id,
            'email' => $email,
            'pass' => $pass,
            'comm' => $comm,
        ]);
    }

    /**
     * @Route("/mail/pass/row/add", name="add_mailpass_row")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function addMailPassRowAction(Request $request)
    {
        $template = $this->roleWithTemplate();

        $form = $this->createForm(MailPassType::class);
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
            return $this->redirectToRoute('admin_MailPass');
        }

        return $this->render('@App/admin/addRowMailPass.html.twig',[
            'orderForm' => $form->createView(),
            'template' => $template
        ]);
    }
}