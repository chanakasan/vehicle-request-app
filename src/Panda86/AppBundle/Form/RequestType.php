<?php

namespace Panda86\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RequestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('journey_type', 'choice', array(
            'choices'   => array(
                'single' => 'Single',
                'return' => 'Single and Return',
                ),
             'multiple'  => false,
             'expanded'  => true,
            ))
            ->add('days')
            ->add('vtype', 'entity',array(
                'class' => 'Panda86AppBundle:VType',
                'property' => 'name',
            ))
            ->add('pickup_time','dateTimePicker')
            ->add('pickup_loc')
            ->add('destination')
            ->add('return_time','dateTimePicker')
            ->add('purpose')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Panda86\AppBundle\Entity\Request'
        ));
    }

    public function getName()
    {
        return 'request';
    }
}
