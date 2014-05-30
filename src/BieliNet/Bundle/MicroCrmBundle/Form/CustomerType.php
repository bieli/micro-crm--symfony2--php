<?php

namespace BieliNet\Bundle\MicroCrmBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CustomerType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('sellerId')
            ->add('name')
            ->add('surname')
            ->add('pesel')
//            ->add('email')
            ->add('phone')
//            ->add('phone2')
//            ->add('description')
//            ->add('type')
//            ->add('source')
//            ->add('sourceType')
//            ->add('createdAt')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BieliNet\Bundle\MicroCrmBundle\Entity\Customer'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bielinet_bundle_microcrmbundle_customer';
    }
}
