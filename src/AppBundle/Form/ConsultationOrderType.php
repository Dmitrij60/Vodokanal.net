<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConsultationOrderType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('district', HiddenType::class, [
                'data' => null,
            ])
            ->add('department', ChoiceType::class, [
                'choices' => [
                    'Абонентский отдел' => 'Абонентский отдел',
                    'Приемная' => 'Приемная',
                    'ПТО' => 'ПТО',
                    'Диспетчерская' => 'Диспетчерская',
                    'Юридический отдел' => 'Юридический отдел',
                    'Бухгалтерия' => 'Бухгалтерия',
                    'Финансовый отдел' => 'Финансовый отдел',
                    'Отдел экономики и бюджетирования' => 'Отдел экономики и бюджетирования',
                    'Отдел кадров' => 'Отдел кадров',
                    'Отдел главного энергетика' => 'Отдел главного энергетика',
                    'ОТЗП' => 'ОТЗП',
                    'Отдел имущественно-земельных отношений' => 'Отдел имущественно-земельных отношений',
                    'ОМТС' => 'ОМТС',
                    'Пресс служба' => 'Пресс служба',
                    'Комендант' => 'Комендант',
                    'Производственный отдел' => 'Производственный отдел',
                    'Технический отдел' => 'Технический отдел',
                    'Отдел тех. присоединение' => 'Отдел тех. присоединение',
                    'Oтдел капитального строительства' => 'Oтдел капитального строительства',
                    'Отдел Охраны труда' => 'Отдел Охраны труда',
                    'Отдел главного технолога' => 'Отдел главного технолога',
                    'Транспортный отдел' => 'Транспортный отдел',
                    'Отдел недропользования' => 'Отдел недропользования',
                    'Служба заказчика' => 'Служба заказчика',
                ],
                'label' => false,])
            ->add('reason', null, [
                'label' => false
            ])
            ->add('contact', null, [
                'label' => false
            ])
        ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\ConsultationOrder'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_consultationorder';
    }


}
