<?php

namespace BieliNet\Bundle\MicroCrmBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SellerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('surname')
            ->add('email')
            ->add('phone')
//            ->add('passwordHash')
//            ->add('activityHash')
            ->add('isActive')
            ->add('createdAt')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BieliNet\Bundle\MicroCrmBundle\Entity\Seller'
        ));
    }

    public function getName()
    {
        return 'bielinet_bundle_microcrmbundle_seller';
    }
}
