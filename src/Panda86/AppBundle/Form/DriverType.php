<?php

namespace Panda86\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DriverType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('first_name', null, array(
                'label' => false,
                'required' => true,
            ))
            ->add('last_name', null, array(
                'label' => false,
                'required' => true,
            ))
            ->add('display_name', null, array(
                'label' => false,
                'required' => true,
            ))
            ->add('address', 'textarea', array(
                'label' => false,
                'required' => true,
            ))
            ->add('birth_date', null, array(
                'label' => false,
                'required' => true,
            ))
            ->add('license_date', null, array(
                'label' => false,
                'required' => true,
            ))
            ->add('license_ref', null, array(
                'label' => false,
                'required' => true,
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Panda86\AppBundle\Entity\Driver'
        ));
    }

    public function getName()
    {
        return 'driver';
    }
}
