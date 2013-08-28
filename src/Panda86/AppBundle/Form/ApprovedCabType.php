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
                'empty_value' => '--',
                'class' => 'Panda86AppBundle:CabService',
                'property' => 'name',
            ))
            ->add('voucher_no')
            ->add('mileage')
            ->add('other_info', 'textarea')
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