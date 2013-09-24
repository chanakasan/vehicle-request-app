<?php

namespace Panda86\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('first_name', null, array(
                'label' => false,
                'required' => false,
            ))
            ->add('last_name', null, array(
                'label' => false,
                'required' => false,
            ))
            ->add('username', null, array(
                'label' => false,
            ))
            ->add('password', 'password', array(
                'label' => false,
            ))
            ->add('email', null, array(
                'label' => false,
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Panda86\UserBundle\Entity\User'
        ));
    }

    public function getName()
    {
        return 'user';
    }
}
