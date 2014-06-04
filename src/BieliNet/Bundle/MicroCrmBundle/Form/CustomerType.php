<?php

namespace BieliNet\Bundle\MicroCrmBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CustomerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('customerTypeId')
//            ->add('sellerId')
            ->add('customerType')
            ->add('seller')
            ->add('name')
            ->add('surname')
            ->add('pesel')
            ->add('email')
            ->add('phone')
            ->add('phone2')
            ->add('description')
            ->add('type')
            ->add('source')
            ->add('sourceType')
            ->add('createdAt')
            ->add('customerType')
            ->add('seller')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BieliNet\Bundle\MicroCrmBundle\Entity\Customer'
        ));
    }

    public function getName()
    {
        return 'bielinet_bundle_microcrmbundle_customer';
    }
}
