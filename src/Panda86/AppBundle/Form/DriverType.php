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
            ->add('first_name', null, array('label' => false))
            ->add('last_name', null, array('label' => false))
            ->add('display_name', null, array('label' => false))
            ->add('address', null, array('label' => false))
            ->add('birth_date', null, array('label' => false))
            ->add('license_date', null, array('label' => false))
            ->add('license_ref', null, array('label' => false))
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
