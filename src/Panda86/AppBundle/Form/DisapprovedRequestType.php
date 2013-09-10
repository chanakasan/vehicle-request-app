<?php

namespace Panda86\AppBundle\Form;

use Panda86\AppBundle\Form\DataTransformer\RequestToNumberTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DisapprovedRequestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $entityManager = $options['em'];
        $transformer = new RequestToNumberTransformer($entityManager);

        $builder
            ->add(
                $builder->create('request', 'hidden', array(
                    'label' => false,
                ))
                    ->addModelTransformer($transformer)
            )
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
        $resolver->setRequired(array(
            'em',
        ));
        $resolver->setAllowedTypes(array(
            'em' => 'Doctrine\Common\Persistence\ObjectManager',
        ));
    }

    public function getName()
    {
        return 'disapproved';
    }
}
