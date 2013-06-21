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
            ->add('requested_for')
            ->add('journey_type', 'choice', array(
            'choices'   => array(
                'single' => 'Single',
                'return' => 'Return',
                ),
             'required'  => true,
            ))
            ->add('start_time','dateTimePicker')
            ->add('start_loc')
            ->add('pickup_time','dateTimePicker')
            ->add('pickup_loc')
            ->add('end_time','dateTimePicker')
            ->add('end_loc')
            ->add('vehicle_type', 'choice', array(
             'choices' => array(
                 'car' => 'Car',
                 'van' => 'Van',
                 'jeep' => 'Jeep',
             ),
            ))
            ->add('purpose')
            ->add('accompanied_by' , 'entity' , array(
                'class'    => 'Panda86AppBundle:Employee' ,
                'property' => 'name' ,
                'expanded' => false ,
                'multiple' => true , ))
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
