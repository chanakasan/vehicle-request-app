<?php

namespace Panda86\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VTypeType extends AbstractType
{
    private function _choicesList()
    {
        $data = array();
        for($i=2; $i<21; $i++)
        {
            $tmp = array( $i => $i );
            $data = $data + $tmp;
        }
        return $data;
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $choices = $this->_choicesList();
        $builder
            ->add('name', null, array('label' => false))
            ->add('passengers', 'choice', array(
                'label' => false,
                'choices' => $choices,
            ))
            ->add('type', null, array('label' => false))
            ->add('descrip', null, array('label' => false))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Panda86\AppBundle\Entity\VType'
        ));
    }

    public function getName()
    {
        return 'vtype';
    }
}
