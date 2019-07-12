<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DepartureOrderType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('district', ChoiceType::class, [
                'choices'=> [
                    'Данков' => 'dankov',
                    'Доброе' => 'dobroe',
                    'Измалково' => 'izmalkovo',
                    'Красное' => 'krasnoe',
                    'Лебедянь' => 'lebedian',
                    'Липецкий р-н' => 'lipeckii',
                    'Становое' => 'stanovoe',
                    'Долгоруково' => 'dolgorukovo',
                ],
                'label' => false
            ])
            ->add('reason', TextareaType::class, [
                'label' => false
            ])
        ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\DepartureOrder'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_departureorder';
    }


}
