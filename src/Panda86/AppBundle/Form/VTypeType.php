<?php

namespace Panda86\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VTypeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'hidden', array('label' => false))
            ->add('passengers', 'number', array(
                'label' => false,
            ))
            ->add('type', null, array('label' => false))
            ->add('descrip', 'textarea', array(
                'label' => false,
                'required' => false
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Panda86\AppBundle\Entity\VType'
        ));
    }

    public function getName()
    {
        return 'vtype';
    }
}
