<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class WitnessType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class, array('label'=>'Nombre'))
            ->add('surname', TextType::class, array('label'=>'Apellidos'))
            ->add('addres', TextType::class, array('label'=>'Dirección'))
            ->add('cp', IntegerType::class, array('label' => 'Código Postal','attr' => array('max' => 99999)))
            ->add('city', TextType::class, array('label'=>'Ciudad'))
            ->add('province', TextType::class, array('label'=>'Provincia'))
            ->add('number')
            ->add('representant')
            ->add('phone', IntegerType::class, array('label' => 'Teléfono','attr' => array('max' => 999999999)))
            ->add('urldnifront', TextType::class, array('label'=>'DNI Delante'))
            ->add('urldnibehind', TextType::class, array('label'=>'DNI Detrás'))
            ->add('users')
            ->add('save', SubmitType::class, array('label' => 'Siguiente'))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Witness'
        ));
    }


    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_witness';
    }


}
