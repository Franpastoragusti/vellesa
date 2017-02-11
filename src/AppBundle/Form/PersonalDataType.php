<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;


class PersonalDataType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array('label' => 'Nombre'))
            ->add('surname', TextType::class, array('label' => 'Apellidos'))
            ->add('phone', IntegerType::class, array('label' => 'Teléfono'))
            ->add('number', IntegerType::class, array('label' => 'Numero'))
            ->add('sip', TextType::class, array('label' => 'SIP'))
            ->add('dni', TextType::class, array('label' => 'DNI/NIE'))
            ->add('users')
            ->add('direction', IntegerType::class, array('label' => 'DireccionId','required' => false))
            ->add('class')
            ->add('houseNumber', IntegerType::class, array('label' => 'Puerta'))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\PersonalData'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_personaldata';
    }


}
