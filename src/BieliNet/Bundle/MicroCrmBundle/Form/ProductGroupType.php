<?php

namespace BieliNet\Bundle\MicroCrmBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductGroupType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('url')
            ->add('createdAt')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BieliNet\Bundle\MicroCrmBundle\Entity\ProductGroup'
        ));
    }

    public function getName()
    {
        return 'bielinet_bundle_microcrmbundle_productgroup';
    }
}
