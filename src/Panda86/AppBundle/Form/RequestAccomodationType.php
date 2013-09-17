<?php

namespace Panda86\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RequestAccomodationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('no_days', 'number', array(
                    'label' => false,
                    'required' => true,
                ))
            ->add('day_rate', 'number', array(
                'label' => false,
                'required' => true,
            ))
            ->add('total_fee', 'number', array(
                'label' => false,
                'required' => true,
            ))
            ->add('descrip', 'textarea', array(
                'label' => false,
                'required' => false,
            ))
        ;

    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Panda86\AppBundle\Entity\RequestAccomodation',
        ));
    }

    public function getName()
    {
        return 'accomodation';
    }
}