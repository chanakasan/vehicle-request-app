<?php

namespace Panda86\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ApprovedRequestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('request', 'entity',array(
                'class' => 'Panda86AppBundle:Request',
                'property' => 'id',
                'label' => false,
            ))
            ->add('vehicle', 'entity', array(
                'empty_value' => '--',
                'class' => 'Panda86AppBundle:Vehicle',
                'property' => 'reg_no',
                'label' => false,
                ))
            ->add('driver', 'entity',array(
                'empty_value' => '--',
                'class' => 'Panda86AppBundle:Driver',
                'property' => 'display_name',
                'label' => false,
                ))
            ->add('remarks', 'textarea', arraY(
                'label' => false,
                'required' => false,
                ))
            ->add('cab', new ApprovedCabType(), array(
                'label' => false,
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Panda86\AppBundle\Entity\ApprovedRequest'
        ));
    }

    public function getName()
    {
        return 'approved';
    }
}
