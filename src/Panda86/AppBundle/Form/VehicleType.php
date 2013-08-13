<?php

namespace Panda86\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VehicleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('make', null, array('label'=> false))
            ->add('model', null, array('label'=> false))
            ->add('reg_no', null, array('label'=> false))
            ->add('vtype','entity', array(
                'class'=>'Panda86\AppBundle\Entity\VType',
                'property'=>'name',
                'label' => false
                ))
            ->add('passengers', null, array('label'=> false))
            ->add('ac', null, array('label'=> false))
            ->add('is_company_owned', null, array('label'=> false))
            ->add('image', 'file', array('label'=> false))
            ->add('remarks', null, array('label'=> false))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Panda86\AppBundle\Entity\Vehicle'
        ));
    }

    public function getName()
    {
        return 'vehicle';
    }
}
