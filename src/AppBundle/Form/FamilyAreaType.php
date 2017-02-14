<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;



class FamilyAreaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('beloved', TextType::class, array(
                'label' => 'Mis seres queridos más cercanos son:(ordenalos por preferencia)'
            ))

            ->add('basicActivities', ChoiceType::class, array(
                'label' => ' Si necesito ayuda para las actividades básicas de la vida diaria quiero que me sea proporcionada por:',
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

            ->add('observations', TextareaType::class, array('label' => 'Añade las observaciones, detalles y puntualizaciones que consideres oportunas:', 'attr' => array('rows' => 8)))
            ->add('save', SubmitType::class, array(
                'attr' => array('label' => 'Enviar')
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
