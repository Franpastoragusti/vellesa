<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EnvironmentAreaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        /*
           * En este apartado el usuario seleccionará una de las caracteristicas que deseé, si el usuario selecciona la segunda
           * deberá rellenar tres campos
           */


        $builder->add('placetobe', ChoiceType::class, array(
            'label' => 'Con respecto al lugar en el que deseo estar, quiero hacer constar lo siguiente:',
            'choices'   => array(
                'Deseo permanecer en mi hogar, rodeado de mi entorno y pertenencias personales.'   => 'Deseo quedarme en casa',
                'Quiero trasladarme a un centro sociosanitario en la que me proporcionen cuidados profesionales especializados.' => 'Trasladarme a un centro',
                'Quiero que el tiempo de hospitalización sea lo más breve posible, valorando el alta con la atención hospitalaria en el domicilio oportuna.' => 'Hospitalizacion durante el tiempo que necesario, valorando la hospitalizacion en el domicilio',
                'Cuando mi estado de salud sea irreversible, rechazo la derivación a un hospital.' => 'Rechazo hospital',
                'Deseo que se me derive al hospital ante cualquier descompensación de mi estado de salud.' => 'Deseo ir a un Hospital',
            ),
            'expanded' => true,
            'multiple'  => true,

        ))


            /*
            * En este apartado el usuario seleccionará el icono de un menú y le aparecerá un textarea donde dará una respuesta breve
            */

            ->add('expressLikes' ,TextareaType::class, array(
                'label' =>'Cuando ya no pueda decidir o expresar mis gustos, quiero que se tengan en cuenta:',
                'attr' => array('rows' => 3)
              ))


            /*
             * En este apartado el usuario deberá seleccionar uno de los dos  checks que aparecen
             */


            ->add('selfwill', ChoiceType::class, array(
                'label' => 'Cuando llegue el momento final de mi vida, esta es mi voluntad:',
                'choices'   => array(
                    'Quiero donar mi cuerpo a la ciencia'   => 0,
                    'Quiero donar todos mis órganos y tejidos' => 1,
                ),
                'expanded' => true,
                'multiple'  => true,

            ))



            /*
           * En este apartado el usuario simplemente deberá rellenar los campos con una respuesta breve
           */

            ->add('farewell' ,TextareaType::class, array(
                'label'=>'Así me gustaría que fuese mi despedida:',
                'attr' => array('rows' => 3)
            ))
            /*
            * En este apartado el usuario simplemente deberá rellenar los campos con una respuesta breve
            */

            ->add('observations', TextareaType::class, array(
                'label'=>'Añade las observaciones, detalles y puntualizaciones que consideres oportunas:',
                'attr' => array('rows' => 3)
            ))


                ->add('save', SubmitType::class, array(
                    'attr' => array('label' => 'Enviar')


            ));


    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\EnvironmentArea'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_environmentarea';
    }


}
