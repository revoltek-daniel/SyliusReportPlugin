<?php

declare(strict_types=1);

namespace Odiseo\SyliusReportPlugin\Form\Type\DataFetcher;

use DateTime;
use Odiseo\SyliusReportPlugin\DataFetcher\TimePeriodDataFetcher;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * @author Diego D'amico <diego@odiseo.com.ar>
 */
final class TimePeriodType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('start', DateType::class, [
                'label' => 'odiseo_sylius_report_plugin.form.time_period.start',
                'years' => range((new DateTime('-100 years'))->format('Y'), (new DateTime())->format('Y')),
            ])
            ->add('end', DateType::class, [
                'label' => 'odiseo_sylius_report_plugin.form.time_period.end',
                'years' => range((new DateTime('-100 years'))->format('Y'), (new DateTime())->format('Y')),
                'required' => false,
            ])
            ->add('period', ChoiceType::class, [
                'choices' => TimePeriodDataFetcher::getPeriodChoices(),
                'multiple' => false,
                'label' => 'odiseo_sylius_report_plugin.form.time_period.period',
            ])
            ->add('empty_records', CheckboxType::class, [
                'label' => 'odiseo_sylius_report_plugin.form.time_period.empty_records',
                'required' => false,
            ])
        ;
    }

    public function getBlockPrefix(): string
    {
        return 'odiseo_sylius_report_data_fetcher_time_period';
    }
}
