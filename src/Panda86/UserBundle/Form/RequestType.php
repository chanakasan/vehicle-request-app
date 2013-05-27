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
            ->add('requestedFor', null, array(
                'label' => 'Requested For: '
            ))
            ->add('journey_type', 'choice', array(
            'label' => 'Journey Type: ',
            'choices'   => array(
                'single' => 'Single',
                'return' => 'Return',
                ),
            'required'  => true,
            ))
            ->add('start_time','date', array(
                'label' => 'Start Date/Time: '
            ))
            ->add('start_loc', null, array(
                'label' => 'Start Location: '
            ))
            ->add('pickup_time','date', array(
                'label' => 'Pickup Date/Time: '
            ))
            ->add('pickup_loc', null, array(
                'label' => 'Pickup Location: '
            ))
            ->add('end_time','date', array(
                'label' => 'End Time: '
            ))
            ->add('end_loc', null, array(
                'label' => 'End Location: '
            ))
            ->add('vehicle_type', 'choice', array(
             'label' => 'Vehicle Type: ',
             'choices' => array(
                 'car' => 'Car',
                 'van' => 'Van',
                 'jeep' => 'Jeep',)
            ))
            ->add('purpose', null, array(
                'label' => 'Journey Purpose: '
            ))
            ->add('accompaniedBy', null, array(
                'label' => 'Accompanied Officers: '
            ))
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
