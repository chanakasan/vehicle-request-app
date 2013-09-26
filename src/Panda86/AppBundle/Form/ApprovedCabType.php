<?php

namespace Panda86\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ApprovedCabType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cab_service', 'entity', array(
                'label' => false,
                'empty_value' => '-- Select --',
                'class' => 'Panda86AppBundle:CabService',
                'property' => 'name',
            ))
            ->add('voucher_no', null, array(
                'label' => false,
                'required' => false,
            ))
            ->add('mileage', null, array(
                'label' => false,
                'required' => false,
            ))
            ->add('rate', null, array(
                'label' => false,
                'required' => false,
            ))
            ->add('cost', null, array(
                'label' => false,
            ))
            ->add('other_info', 'textarea', array(
                'label' => false,
                'required' => false,
            ))
        ;

    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Panda86\AppBundle\Entity\ApprovedCab',
        ));
    }

    public function getName()
    {
        return 'cab';
    }
}