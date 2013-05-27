<?php

namespace Panda86\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RequestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('requestedFor')
            ->add('journey_type', 'choice', array(
            'choices'   => array(
                'single' => 'Single',
                'return' => 'Return',
                ),
            'required'  => true,
            ))
            ->add('start_date','datePicker')
            ->add('start_time','dateTimePicker')
            ->add('start_loc')
            ->add('pickup_date','datePicker')
            ->add('pickup_time','dateTimePicker')
            ->add('pickup_loc')
            ->add('end_date','datePicker')
            ->add('end_time','dateTimePicker')
            ->add('end_loc')
            ->add('vehicle_type', 'choice', array(
             'choices' => array(
                 'car' => 'Car',
                 'van' => 'Van',
                 'jeep' => 'Jeep',)
            ))
            ->add('purpose')
            ->add('accompaniedBy')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Panda86\UserBundle\Entity\Request'
        ));
    }

    public function getName()
    {
        return 'panda86_userbundle_requesttype';
    }
}
