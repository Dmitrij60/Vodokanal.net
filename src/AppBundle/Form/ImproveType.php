<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ImproveType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('sender', HiddenType::class, [
                'data' => null,
            ])
            ->add('category', ChoiceType::class, [
                'choices' => [
                    'Улучшение рабочего места' => 'Улучшение рабочего места',
                    'Улучшение технологического процесса' => 'Улучшение технологического процесса',
                    'Улучшение с экономическим эффектом' => 'Улучшение с экономическим эффектом',
                    'Предложения по улучшению приложения' => 'Предложения по улучшению приложения',
                ],
                'label' => false,
            ])
            ->add('suggestion', TextareaType::class, [
                'label' => false
            ]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Improve'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_improve';
    }


}
