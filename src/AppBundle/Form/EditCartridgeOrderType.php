<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Security\Core\Security;


class EditCartridgeOrderType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       $builder

            ->add('status', ChoiceType::class, [
                'choices' => [
                    'Отпралвена' => 'Отпралвена',
                    'Изменена' => 'Изменена',
                    'Закрыта' => 'Закрыта',
                ],
                'label' => false,])

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
