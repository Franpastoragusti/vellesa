<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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
        $builder->add('placetobe', ChoiceType::class, array(

            'choices'   => array(
                'Deseo permanecer en mi hogar, rodeado de mi entorno y pertenencias personales:'   => 'casa',
                'Quiero trasladarme a un centro sociosanitario en la que me proporcionen cuidados profesionales especializados' => 'Profesional',
                'Quiero que el tiempo de hospitalización sea lo más breve posible, valorando el alta con la atención hospitalaria en el domicilio oportuna.' => 'hopsbreve',
                'Cuando mi estado de salud sea irreversible, rechazo la derivación a un hospital.' => 'irreversible',
            ),
            'expanded' => true,
            'multiple'  => false,

        ))


            ->add('expressLikes' ,TextareaType::class)


            ->add('selfwill', ChoiceType::class, array(

                'choices'   => array(
                    'Quiero donar mi cuerpo a la ciencia'   => 'donarCuerpo',
                    'Quiero donar todos mis órganos y tejidos' => 'donrOrganos',
                ),
                'expanded' => true,
                'multiple'  => true,

            ))
            ->add('farewell' ,TextareaType::class)
            
            ->add('observations', TextareaType::class);
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
