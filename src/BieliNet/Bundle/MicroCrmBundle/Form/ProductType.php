<?php

namespace BieliNet\Bundle\MicroCrmBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('productGroupId')
//            ->add('providerId')
            ->add('productGroup')
            ->add('provider')
            ->add('name')
            ->add('description')
            ->add('url')
            ->add('commissionForGranting')
            ->add('insuranceTypeId')
            ->add('insuranceAmount')
            ->add('interest_base_rate')
            ->add('interestKindId')
            ->add('interestAmount')
            ->add('interestMargin')
            ->add('commissionForEarlyRepaymentAmount')
            ->add('commissionForEarlyRepaymentTo')
            ->add('tranchesCount')
            ->add('creditAmount')
            ->add('creditAgreementDate')
            ->add('creditStartDate')
            ->add('creditPeriodInMonths')
            ->add('creditEndDate')
            ->add('gracePeriodForRepaymentOfCapitalInMonths')
            ->add('insuranceLifeTo')
//            ->add('createdAt')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BieliNet\Bundle\MicroCrmBundle\Entity\Product'
        ));
    }

    public function getName()
    {
        return 'bielinet_bundle_microcrmbundle_product';
    }
}
