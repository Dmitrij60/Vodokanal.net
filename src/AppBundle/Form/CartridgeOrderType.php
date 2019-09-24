<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Security\Core\Security;


class CartridgeOrderType extends AbstractType
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
                    'Отдел реализации' => 'Отдел реализации',
                ],
                'label' => false,])
            ->add('cartridgeModel', ChoiceType::class, [
                'choices' => [
                    'CS-CF280XS' => 'CS-CF280XS',
                    'CZ130A' => 'CZ130A',
                    'TK-3130' => 'TK-3130',
                    'CS-C737' => 'CS-C737',
                    'CF 226A' => 'CF 226A',
                    'CE285A' => 'CE285A',
                    '106R03585' => '106R03585',
                    '106R03623' => '106R03623',
                    'CS-TK1170' => 'CS-TK1170',
                    'TK-6115' => 'TK-6115',
                    'CS-CF214XV' => 'CS-CF214XV',
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
