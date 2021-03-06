<?php

namespace BieliNet\Bundle\MicroCrmBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormError;

class ProductFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', 'filter_number_range')
            ->add('productGroupId', 'filter_number_range')
            ->add('providerId', 'filter_number_range')
            ->add('name', 'filter_text')
            ->add('description', 'filter_text')
            ->add('commissionForGranting', 'filter_number_range')
            ->add('insuranceTypeId', 'filter_number_range')
            ->add('insuranceAmount', 'filter_number_range')
            ->add('interest_base_rate', 'filter_number_range')
            ->add('interestKindId', 'filter_number_range')
            ->add('interestAmount', 'filter_number_range')
            ->add('interestMargin', 'filter_number_range')
            ->add('commissionForEarlyRepaymentAmount', 'filter_number_range')
            ->add('commissionForEarlyRepaymentTo', 'filter_date_range')
            ->add('tranchesCount', 'filter_number_range')
            ->add('creditAmount', 'filter_number_range')
            ->add('creditAgreementDate', 'filter_date_range')
            ->add('creditStartDate', 'filter_date_range')
            ->add('creditPeriodInMonths', 'filter_number_range')
            ->add('creditEndDate', 'filter_date_range')
            ->add('gracePeriodForRepaymentOfCapitalInMonths', 'filter_number_range')
            ->add('insuranceLifeTo', 'filter_date_range')
            ->add('url', 'filter_text')
            ->add('createdAt', 'filter_date_range')
        ;

        $listener = function(FormEvent $event)
        {
            // Is data empty?
            foreach ($event->getData() as $data) {
                if(is_array($data)) {
                    foreach ($data as $subData) {
                        if(!empty($subData)) return;
                    }
                }
                else {
                    if(!empty($data)) return;
                }
            }

            $event->getForm()->addError(new FormError('Filter empty'));
        };
        $builder->addEventListener(FormEvents::POST_BIND, $listener);
    }

    public function getName()
    {
        return 'bielinet_bundle_microcrmbundle_productfiltertype';
    }
}
