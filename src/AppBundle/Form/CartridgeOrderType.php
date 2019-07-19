<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CartridgeOrderType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('district', ChoiceType::class, [
                'choices' => [
                    'Данков' => 'dankov',
                    'Доброе' => 'dobroe',
                    'Измалково' => 'izmalkovo',
                    'Красное' => 'krasnoe',
                    'Лебедянь' => 'lebedian',
                    'Липецкий р-н' => 'lipeckii',
                    'Становое' => 'stanovoe',
                    'Долгоруково' => 'dolgorukovo',
                ],
                'label' => false,
            ])
            ->add('department', ChoiceType::class, [
                'choices' => [
                    'Абонентский отдел' => 'abon',
                    'Приемная' => 'priem',
                    'ПТО' => 'pto',
                    'Диспетчерская' => 'disp',
                ],
                'label' => false,])
            ->add('cartridgeModel', ChoiceType::class, [
                'choices' => [
                    '280' => '280',
                    '78A' => '78A',
                    '3310' => '3310',
                    '3130' => '3130',
                    '505' => '505',
                ],
                'label' => false,
            ])
            ->add('count', null, [
                'label' => false,
            ]);

    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\CartridgeOrder'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_cartridgeorder';
    }


}
