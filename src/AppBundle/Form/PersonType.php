<?php

namespace AppBundle\Form;

use AppBundle\Entity\Direction;
use AppBundle\Entity\PersonalData;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;


class PersonType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('personalData', PersonalDataType::class, array(
                'data_class' => PersonalData::class
            ))
            ->add('direction', DirectionType::class, array(
                'data_class' => Direction::class
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
            'data_class' => null
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'person_form';
    }


}
