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
                'oneday-single' => 'Single',
                'oneday-return' => 'Return',
                ),
             'required'  => true,
             'multiple'  => true,
             'expanded'  => true,
            ))
            ->add('days')
            ->add('vtype')
            //->add('pickup_time','dateTimePicker')
            ->add('pickup_loc')
            ->add('destination')
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
