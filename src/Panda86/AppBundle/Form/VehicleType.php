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
            ->add('make', null, array(
                'label'=> false,
                'required'=> true,
            ))
            ->add('model', null, array(
                'label'=> false,
                'required'=> true,
            ))
            ->add('reg_no', null, array(
                'label'=> false,
                'required'=> true,
            ))
            ->add('vtype','entity', array(
                'class'=>'Panda86\AppBundle\Entity\VType',
                'property'=>'name',
                'label' => false,
                'required'=> true,
                ))
            ->add('passengers', null, array(
                'label'=> false,
                'required'=> true,
            ))
            ->add('ac', null, array(
                'label'=> false,
                'required'=> false,
            ))
            ->add('is_company_owned', null, array(
                'label'=> false,
                'required'=> false,
            ))
            ->add('image', 'file', array(
                'data_class' => null,
                'label'=> false,
                'required'=> false,
            ))
            ->add('remarks', null, array(
                'label'=> false,
                'required'=> false,
            ))
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
