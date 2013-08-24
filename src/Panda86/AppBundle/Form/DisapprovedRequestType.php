<?php

namespace Panda86\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DisapprovedRequestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('request', 'entity',array(
                'class' => 'Panda86AppBundle:Request',
                'property' => 'id',
                'label' => false,
            ))
            ->add('remarks', 'textarea', arraY(
                'label' => false,
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Panda86\AppBundle\Entity\DisapprovedRequest'
        ));
    }

    public function getName()
    {
        return 'panda86_appbundle_disapprovedrequesttype';
    }
}
