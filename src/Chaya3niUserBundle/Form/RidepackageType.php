<?php

namespace Chaya3niUserBundle\Form;

use Chaya3niUserBundle\Entity\Ridepassenger;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RidepackageType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('description')->add('size')->add('typepackage')->add('quantity')->add('poids')->add('prix') ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Chaya3niUserBundle\Entity\Ridepackage'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'chaya3niuserbundle_ridepackage';
    }


}
