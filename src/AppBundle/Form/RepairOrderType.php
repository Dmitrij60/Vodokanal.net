<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class RepairOrderType extends AbstractType
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
                    'Абонентский отдел' => 'abon',
                    'Приемная' => 'priem',
                    'ПТО' => 'pto',
                    'Диспетчерская' => 'disp',
                ],
                'label' => false,])
            ->add('type', ChoiceType::class, [
                'choices' =>[
                    'Принтер' => 'print',
                    'Компьютер' => 'komp',
                    'Телефон' => 'tel',
                    'Касса' => 'kassa'
                ],
                'label' => false
            ])
            ->add('invNum', null, [
                'label' => false
            ])
            ->add('reason', null, [
                'label' => false
            ])
            ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\RepairOrder'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_repairorder';
    }


}
