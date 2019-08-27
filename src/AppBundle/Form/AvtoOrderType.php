<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AvtoOrderType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('district', ChoiceType::class, [
                'choices' => [
                    'г. Липецк' => 'г. Липецк',
                    'Данков' => 'Данков',
                    'Доброе' => 'Доброе',
                    'Измалково' => 'Измалково',
                    'Красное' => 'Красное',
                    'Лебедянь' => 'Лебедянь',
                    'Липецкий район' => 'Липецкий район',
                    'Становое' => 'Становое',
                    'Долгоруково' => 'Долгоруково',
                    'Усмань' => 'Усмань',
                    'Хлевное' => 'Хлевное',
                    'Тербуны' => 'Тербуны',
                    'Волово' => 'Волово',
                    'Лев-Толстой' => 'Лев-Толстой',
                    'Чаплыгин' => 'Чаплыгин',
                    'Добринка' => 'Добринка',
                    'Задонск' => 'Задонск',
                ],
                'label' => false,])
            ->add('reason', null, [
                'label' =>false
            ])
            ->add('address', null, [
                'label' =>false
            ])
            ->add('sender', HiddenType::class, [
                'data' => null,
            ]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\AvtoOrder'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_avtoorder';
    }


}
