<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FamilyAreaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        /*como hemos decidido que mejor hacerlo mediante jsonarray y no tablas aparte al ser datos unicos y
        no compartidos por mas usuarios.

        Ocurre lo siguiente:

        - Actuamos desde el form y no entities, por lo que cuando el usuario selecciona un familiar o profesional, deberá ser
        mediante html donde aparezca tres inputs para que rellene y guardarlos en bbdd como jsonArray, si te parece bien todo correcto
        sino podemos cambiarlo

        - Montante lo que es el diseño y demás y mientras miro mientras symofony documentation si se puede dar valor a lo seleccionado
            y etc.


        */

        $builder->add('beloved', TextareaType::class)

            ->add('basicActivities', ChoiceType::class, array(

                'choices'   => array(
                    'Un familiar o ser querido. Mis preferencias son:'   => 'familiar',
                    'Un profesional. Mis preferencias son:' => 'Profesional',
                ),
                'expanded' => true,
                'multiple'  => false,

            ))

            /*
             * En este apartado lo que ocurre es que un usario selecciona una de las dos y aparece tres inputs para escribir en
             *  tres espacios, si elige la tercera aparecerá un input en el que escriba en un textArea
             */





            ->add('instrumentActivities', ChoiceType::class, array(

                'choices'   => array(
                    'Un familiar o ser querido. Mis preferencias son:'   => 'familiar',
                    'Un profesional. Mis preferencias son:' => 'Profesional',
                    'otros:' => 'otros',
                ),
                'expanded' => true,
                'multiple'  => false,
            ))

            /*
            * En este apartado lo que ocurre es que un usario selecciona una de las dos y aparece tres inputs para escribir en
            *  tres espacios, si elige la tercera aparecerá un input en el que escriba en un textArea
            */



            ->add('mentalFaculty', ChoiceType::class, array(
                'choices'   => array(
                    'Sí'   => 'si',
                    'No' => 'no',

                ),
                'expanded' => true,
                'multiple'  => false,
            ))

            /*
            * En este apartado lo que ocurre es que si el usuario selecciona que si, aparecen otros tres text para escribir
             * si seleciona que no se queda tal cual
            */




            ->add('visits' , ChoiceType::class, array(
                'choices'   => array(
                    'Agradezco todo tipo de visitas' => 'Todasvisitas',
                    'Todas las visitias deben ser avisadas con antelación '   => 'AvisoVistas',
                    'Deseo que se respete mi intimidad, no quiero tener visitas de ningun tipo mientras...'   => 'RespetoIntimidad',
                    'No deseo recibir visitas más alla de mis seres queridos maás cercanos '   => 'NoRecibirVisitas',
                    'No se dará información personal sobre mi a personas ajenas a mis seres queridos más cercanos'   => 'NodarInfo',
                ),
                'expanded' => true,
                'multiple'  => true,
            ))

            /*
             * En ese apartado puede seleccionar las que quiera no tiene más complejidad
             */


            ->add('observations', TextareaType::class);

    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\FamilyArea'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_familyarea';
    }


}
