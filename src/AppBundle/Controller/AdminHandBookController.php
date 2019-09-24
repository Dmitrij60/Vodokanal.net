<?php
namespace AppBundle\Controller;

use AppBundle\Entity\HandBook;
use AppBundle\Form\HandBookType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;



class  AdminHandBookController extends ApplicationController
{
    /**
     * @Route("/edit_handbook_row_status/{id}", name="edit_handbook_row")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function hendBookEditRowAction($id)
    {
        $template = $this->roleWithTemplate();

        $em = $this->getDoctrine()->getManager();
        $row = $em->getRepository(HandBook::class)->find($id);

        $fio = $row->getFio();
        $department = $row->getDepartment();
        $position = $row->getPosition();
        $email = $row->getEmail();
        $shortPhone = $row->getSHortPhone();

        if(isset($_POST['fio']) || isset($_POST['department']) || isset($_POST['position']) || isset($_POST['email']) || isset($_POST['shortPhone']) ){
            $fio = $_POST['fio'];
            $department = $_POST['department'];
            $position = $_POST['position'];
            $email = $_POST['email'];
            $shortPhone = $_POST['shortPhone'];

            $id = $_POST['id'];
            if (!$row) {
                throw $this->createNotFoundException(
                    'No order found for id '.$id
                );
            }

            $row->setFio($fio);
            $row->setDepartment($department);
            $row->setPosition($position);
            $row->setEmail($email);
            $row->setShortPhone($shortPhone);
            $em->flush();
            $this->addFlash('success', 'Статус заявки изменен');
            return $this->redirectToRoute('admin_handbook');
        }
        return $this->render('@App/admin/editHandBook.html.twig', [
            'template' => $template,
            'id' => $id,
            'fio' => $fio,
            'position' => $position,
            'department' => $department,
            'email' => $email,
            'shortPhone' => $shortPhone,
        ]);
    }

    /**
     * @Route("/handbook/row/del/{id}", name="del_handbook_row")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function delHandBoorRowAction($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $rowId = $entityManager->getRepository(HandBook::class)->find($id);
        $entityManager->remove($rowId);

        if (!$rowId) {
            throw $this->createNotFoundException(
                'No consultation found for id '.$id
            );
        }
        $entityManager->flush();
        $this->addFlash('warning','Строка удалена');
        return $this->redirectToRoute('admin_handbook', [
            'id' => $rowId->getId()
        ]);
    }

    /**
     * @Route("/handbook/row/add", name="add_handbook_row")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function addHandBoorRowAction(Request $request)
    {
        $template = $this->roleWithTemplate();
        $buttonLink = 'path(\'add_handbook_row\')';

        $form = $this->createForm(HandBookType::class);
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
            return $this->redirectToRoute('admin_handbook');
        }

        return $this->render('@App/admin/addRowHandBook.html.twig',[
            'orderForm' => $form->createView(),
            'template' => $template,
            'buttonLink' => $buttonLink
        ]);
    }
}