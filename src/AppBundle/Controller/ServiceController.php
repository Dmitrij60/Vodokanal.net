<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CartridgeOrder;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Task;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class ServiceController extends Controller
{
    /**
     * @Route("/service", name="service_list" )
     */
    public function indexAction(Request $request)
    {
        $cartridge = $this->getDoctrine()->getRepository('AppBundle:Cartridge')->findAll();
        dump($cartridge);
        die();
        $services = [
            '0' => 'Заявки на картриджи',
            '1' => 'Ремонт техники',
            '2' => 'Консультация',
            '3' => 'Заявка на выезд',
        ];
        return  $this->render('@App/service/index.html.twig');
    }

    /**
     * @Route("/service/{id}", name="service_item", requirements={"id": "[0-9]+"})
     * @param $id
     * @return Response
     */
    public function showAction($id)
    {
        $services = [
            '0' => '1',
            '1' => 'Ремонт техники',
            '2' => 'Консультация',
            '3' => 'Заявка на выезд',
        ];

        return $this->render('@App/service/show.html.twig',[
            'id' => $id,
            'service' => $services[$id]
        ]);
    }

    /**
     * @Route("/service/cartridge", name="service_cartridge")
     */
    public function cartridgeAction()
    {
        $task = new CartridgeOrder();
        $task->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createFormBuilder($task)
            //->add('task', TextType::class, ['label' => 'Укажите причину обращения'])
            ->add('district', ChoiceType::class, array(
                'choices'  => array(
                    'Данков' => null,
                    'Доброе' => true,
                    'Измалково' => false,
                    'Красное' => null,
                    'Лебедянь' => true,
                    'Липецкий' => false,
                    'Становое' => null,
                    'Долгоруково' => true,
                    'Усмань' => false,
                    'Хлевное' => null,
                    'Тербуны' => true,
                    'Волово' => false,
                    'Лев-Толстой' => null,
                    'Чаплыгин' => true,
                    'Добринка' => false,
                    'Задонск' => false,
                )))
            ->add('department', TextType::class, ['label' => 'Отдел'])
            ->add('cartridgeModel', TextType::class, ['label' => 'Модель картриджа'])
            ->add('printerModel', TextType::class, ['label' => 'Модель принтера'])
            ->add('dueDate', DateType::class, ['label' => 'На какой месяц заявка'])
            ->add('isAttending', ChoiceType::class, array(
                'choices'  => array(
                    'Maybe' => null,
                    'Yes' => true,
                    'No' => false,
                ),
            ))
            ->add('save', SubmitType::class, ['label' => 'Отправить заявку'])
            ->getForm();

        return $this->render('@App/service/cartridges.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/service/repair", name="service_repair")
     */
    public function repairAction()
    {
        $task = new Task();
        $task->setTask('Укажте причину обращения');
        $task->setDistrict('Укажте район');


        $task->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createFormBuilder($task)
            ->add('task', TextType::class, ['label' => 'Укажите причину обращения'])
            ->add('district', TextType::class, ['label' => 'Район'])
            ->add('department', TextType::class, ['label' => 'Отдел'])
            ->add('dueDate', DateType::class)
            ->add('save', SubmitType::class, ['label' => 'Create Task'])
            ->getForm();

        return $this->render('@App/service/repair.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/service/consultation", name="service_consultation")
     */
    public function consultationAction()
    {
        $task = new Task();
        $task->setTask('Укажте причину обращения');
        $task->setDistrict('Укажте район');


        $task->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createFormBuilder($task)
            ->add('task', TextType::class, ['label' => 'Укажите причину обращения'])
            ->add('district', TextType::class, ['label' => 'Район'])
            ->add('department', TextType::class, ['label' => 'Отдел'])
            ->add('dueDate', DateType::class)
            ->add('save', SubmitType::class, ['label' => 'Create Task'])
            ->getForm();

        return $this->render('@App/service/consultation.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/service/departure", name="service_departure")
     */
    public function departureAction()
    {
        $task = new Task();
        $task->setTask('Укажте причину обращения');
        $task->setDistrict('Укажте район');
        $task->setDueDate(new \DateTime('tomorrow'));
        $form = $this->createFormBuilder($task)
            ->add('task', TextType::class, ['label' => 'Укажите причину обращения'])
            ->add('district', TextType::class, ['label' => 'Район'])
            ->add('department', TextType::class, ['label' => 'Отдел'])
            ->add('dueDate', DateType::class)
            ->add('save', SubmitType::class, ['label' => 'Create Task'])
            ->getForm();

        return $this->render('@App/service/departure.twig', [
            'form' => $form->createView(),
        ]);
    }
}
