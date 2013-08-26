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
            ->add('requester', 'entity',array(
                'class' => 'Panda86AppBundle:Employee',
                'property' => 'name',
                'label' => false,
            ))
            ->add('journey_type', 'choice', array(
            'choices'   => array(
                'single' => 'Single',
                'return' => 'Single and Return',
                ),
             'label' => false,
             'expanded'  => true,
            ))
            ->add('days', 'hidden')
            ->add('vtype', 'entity',array(
                'class' => 'Panda86AppBundle:VType',
                'property' => 'name',
                'label' => false,
            ))
            ->add('start_time','time', array(
                'required' => false,
                'label' => false,
                'input' => 'datetime',
                'widget' => 'single_text'
            ))
            ->add('pickup_time','dateTimePicker', array(
                'label' => false,
            ))
            ->add('pickup_loc', 'text', array(
                'label' => false,
            ))
            ->add('destination', 'text', array(
                'label' => false,
            ))
            ->add('return_time','time', array(
                'label' => false,
                'input' => 'datetime',
                'widget' => 'single_text'
            ))
            ->add('purpose', 'text', array(
                'label' => false,
            ))
            ->add('accomodation_fee', 'text', array(
                'label' => false,
            ))
            ->add('accomodation_info', 'text', array(
                'label' => false,
            ))
            ->add('accompanied_by', 'entity',array(
                'class' => 'Panda86AppBundle:Employee',
                'property' => 'name',
                'label' => false,
                'multiple'  => true,
            ))
            ->add('more_info', 'textarea', array(
                'required' => false,
                'label' => false,
            ))
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
