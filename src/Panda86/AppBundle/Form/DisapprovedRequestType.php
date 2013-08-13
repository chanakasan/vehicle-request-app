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
            ->add('remarks')
            ->add('active')
            ->add('message')
            ->add('created')
            ->add('updated')
            ->add('request')
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
