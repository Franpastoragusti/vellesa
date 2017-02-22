<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;




class FamilyAreaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('beloved', TextAreaType::class, array(
                'label' => 'Mis seres queridos más cercanos son:'
            ))

            ->add('profesionals', HiddenType::class)

            ->add('basicActivities', ChoiceType::class, array(
                'label' => ' Si necesito ayuda para las actividades básicas de la vida diaria quiero que me sea proporcionada por:',
                'label_attr' => array('class' => 'addd'),
                'choices'   => array(
                    'Un familiar o ser querido. Mis preferencias son:'   => 0,
                    'Un profesional. Mis preferencias son:' => 1,
                    'Otros:' => 2
                ),
                'expanded' => true,
                'multiple'  => false,

            ))

            ->add('instrumentActivities', ChoiceType::class, array(
                'label' => 'Si necesito ayuda para las actividades instrumentales y avanzadas de la vida diaria quiero que me sea proporcionada por:',
                'choices'   => array(
                    'Un familiar o ser querido. Mis preferencias son:'   => 0,
                    'Un profesional. Mis preferencias son:' => 1,
                    'Otros:' => 2
                ),
                'expanded' => true,
                'multiple'  => false,
            ))


            ->add('mentalFaculty', ChoiceType::class, array(
                'label' => 'En el caso de que estén afectadas mis facultades mentales, quiero que se tramiten las medidas de protección legales existentes para evitar abusos y conflictos.',
                'choices'   => array(
                    'Sí'   => 0,
                    'No' => 1,
                ),
                'expanded' => true,
                'multiple'  => false,
            ))

            ->add('visits', ChoiceType::class, array(
                'expanded' => true,
                'multiple' => true,
                'label' => 'En cuanto a las visitas que voy a recibir, quiero dejar claro:',
                'choices' => array(
                    'Agradezco todo tipo de visitas de forma libre.' => 0,
                    'Todas las visitas deben avisar antes a las personas que me atienden o a mis seres queridos más cercanos, para asegurar que se cumplen mis deseos. Si no lo hacen, no deseo recibirlas.' => 1,
                    'Deseo que se respete mi intimidad, no quiero tener visitas de ningún tipo mientras como, duermo o realizo tareas relacionadas con el aseo personal.' => 2,
                    'No deseo recibir visitas más allá de mis seres queridos más cercanos.' => 3,
                    'No se dará información personal sobre mi a personas ajenas a mis seres queridos más cercanos.' => 4,

                )))


            ->add('observations', TextareaType::class, array(
              'label' => 'Añade las observaciones, detalles y puntualizaciones que consideres oportunas:',
              'attr' => array('rows' => 4)
            ))

            ->add('Siguiente', SubmitType::class, array(
                'attr' => array('class' => 'btn-vellesa col-md-6 col-md-offset-3 start')
            ))

            ->add('Atrás', ButtonType::class, array(
                'attr' => array('class' => 'btn-vellesa  col-md-6 col-md-offset-3 start', 'value' => 'Atrás', 'onclick' =>'history.back(-1)')

            ))
        ;

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
