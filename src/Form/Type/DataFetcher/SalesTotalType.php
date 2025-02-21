<?php

declare(strict_types=1);

namespace Odiseo\SyliusReportPlugin\Form\Type\DataFetcher;

use Symfony\Component\Form\FormBuilderInterface;

/**
 * @author Łukasz Chruściel <lukasz.chrusciel@lakion.com>
 * @author Diego D'amico <diego@odiseo.com.ar>
 */
class SalesTotalType extends TimePeriodChannelType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        parent::buildForm($builder, $options);

        $this->queryFilterFormBuilder->addUserGender($builder);
        $this->queryFilterFormBuilder->addUserCountry($builder, 'shipping');
        $this->queryFilterFormBuilder->addUserCity($builder, 'shipping');
        $this->queryFilterFormBuilder->addUserProvince($builder, 'shipping');
        $this->queryFilterFormBuilder->addUserPostcode($builder, 'shipping');
        $this->queryFilterFormBuilder->addUserCountry($builder, 'billing');
        $this->queryFilterFormBuilder->addUserCity($builder, 'billing');
        $this->queryFilterFormBuilder->addUserProvince($builder, 'billing');
        $this->queryFilterFormBuilder->addUserPostcode($builder, 'billing');
    }

    public function getBlockPrefix(): string
    {
        return 'odiseo_sylius_report_data_fetcher_sales_total';
    }
}
