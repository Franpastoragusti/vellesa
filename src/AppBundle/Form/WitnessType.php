<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


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
            ->add('province',ChoiceType::class, array('label'=>'Provincia','choices'  => array(
             'Álava' => 'Álava',
             'Albacete' => 'Albacete',
             'Alicante' => 'Alicante',
             'Almería' => 'Almería',
             'Asturias' => 'Asturias',
             'Ávila' => 'Ávila',
             'Badajoz' => 'Badajoz',
             'Barcelona' => 'Barcelona',
             'Burgos' => 'Burgos',
             'Cáceres' => 'Cáceres',
             'Cádiz' => 'Cádiz',
             'Cantabria' => 'Cantabria',
             'Castellón' => 'Castellón',
             'Ceuta' => 'Ceuta',
             'Ciudad Real' => 'Ciudad Real',
             'Córdoba' => 'Córdoba',
             'Cuenca' => 'Cuenca',
             'Girona' => 'Girona',
             'Las Palmas' => 'Las Palmas',
             'Granada' => 'Granada',
             'Guadalajara' => 'Guadalajara',
             'Guipúzcoa' => 'Guipúzcoa',
             'Huelva' => 'Huelva',
             'Huesca' => 'Huesca',
             'Islas Baleares' => 'Islas Baleares',
             'Jaén' => 'Jaén',
             'A Coruña' => 'A Coruña',
             'La Rioja' => 'La Rioja',
             'León' => 'León',
             'Lleida' => 'Lleida',
             'Lugo' => 'Lugo',
             'Madrid' => 'Madrid',
             'Málaga' => 'Málaga',
             'Melilla' => 'Melilla',
             'Murcia' => 'Murcia',
             'Navarra' => 'Navarra',
             'Ourense' => 'Ourense',
             'Palencia' => 'Palencia',
             'Pontevedra' => 'Pontevedra',
             'Salamanca' => 'Salamanca',
             'Segovia' => 'Segovia',
             'Sevilla' => 'Sevilla',
             'Soria' => 'Soria',
             'Tarragona' => 'Tarragona',
             'Santa Cruz de Tenerife' => 'Santa Cruz de Tenerife',
             'Teruel' => 'Teruel',
             'Toledo' => 'Toledo',
             'Valencia' => 'Valencia',
             'Valladolid' => 'Valladolid',
             'Vizcaya' => 'Vizcaya',
             'Zamora' => 'Zamora',
             'Zaragoza' => 'Zaragoza'
                 )
               ))
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
