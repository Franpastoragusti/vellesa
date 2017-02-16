<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonalAreaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('importantDocuments', TextareaType::class, array(
            'label' =>
                'Trámites pendientes y documentación importante:',
            'attr' => array('rows' => 6)))


            ->add('comunicateTo', TextareaType::class, array(
                'label' =>

                    ' Quiero que comuniquéis a estas personas lo siguiente:',
                'attr' => array('rows' => 6)))
            ->add('emotionalLegacy', TextareaType::class, array(
                'label' =>

                    'He dejado preparado mi legado emocional, para acceder a él debéis:',
                'attr' => array('rows' => 6)))
            ->add('perfomDigitalTestament', TextareaType::class, array(
                'label' =>

                    'He realizado mi testamento digital, para acceder a él debéis:',
                'attr' => array('rows' => 6)))
            ->add('observations', TextareaType::class, array(
                'label' =>

                    'Añade las observaciones, detalles y puntualizaciones que consideres oportunas.',
                'attr' => array('rows' => 6)))

            ->add('save', SubmitType::class, array(
                'attr' => array(
                    'label' => 'Enviar'
                )))


        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\PersonalArea'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_personalarea';
    }


}
