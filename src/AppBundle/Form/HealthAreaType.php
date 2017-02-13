<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HealthAreaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            /*
             * El usuario deberá seleccionar lo que mas le interese
             */
            ->add('decideMyself', ChoiceType::class, array(

                'choices'   => array(
                    'Para mi es fundamental la calidad, la dignidad de mi vida y el confort'   => 'calidad',
                    'Entiendo que existen medidas de soporte vital para alargar mi vida, pero no deseo que me sean aplicadas.' => 'soportevital',
                    'Para mí es importante que cuando se apliquen los tratamientos necesarios para mi curación no se prolonguen de manera innecesaria en el tiempo.' => 'tratamientos',
                    'Deseo que se me apliquen los tratamientos y/o terapias necesarias para mantener mi estado de salud, independientemente del tiempo 
                    que sea necesario aplicarlos y de lo agresivo que pueda llegar a ser. ' => 'independientemente',
                    'Deseo que se controle el posible dolor con los métodos que sean necesarios, quiero evitar el sufrimiento. '   => 'calidad',
                    'Es posible que existan tratamientos o terapias no contrastadas y/o que no se demuestre que consigan curar 
                     mi estado. Gracias, pero no deseo que me sean aplicadas. '   => 'calidad',

                ),
                'expanded' => true,
                'multiple'  => false,

            ))

            /*
             * El usuario deberá elegir entre si o no
             */

            ->add('knowAll', ChoiceType::class, array(
                'choices' => array(
                    'si' => true,
                    'no' => false,

                ),

                'expanded' => true,
                'multiple'  => false,

                'choice_label' => function ($value, $key, $index) {
                    if ($value == true) {
                        return strtoupper($key);
                    }else{
                        return strtoupper($key);
                    }


                },))


            /*
            * El usuario deberá completar un campo de texto
            */
            ->add('personInCharge', TextareaType::class)



            /*
            * El usuario deberá elegir entre si o no
            */

            ->add('beloved', ChoiceType::class, array(
                'choices' => array(
                    'si' => true,
                    'no' => false,

                ),

                'expanded' => true,
                'multiple'  => false,

                'choice_label' => function ($value, $key, $index) {
                    if ($value == true) {
                        return strtoupper($key);
                    }else{
                        return strtoupper($key);
                    }


                },))

            /*
            * El usuario deberá completar un campo de texto
            */
            ->add('observations', TextareaType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\HealthArea'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_healtharea';
    }


}
