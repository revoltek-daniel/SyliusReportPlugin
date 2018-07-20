<?php

namespace Odiseo\SyliusReportPlugin\DataFetcher;

use Odiseo\SyliusReportPlugin\Form\Type\DataFetcher\NumberOfOrdersType;
use Sylius\Component\Order\Model\OrderInterface;

class NumberOfOrdersDataFetcher extends TimePeriod
{
    /**
     * {@inheritdoc}
     */
    protected function getData(array $configuration = [])
    {
        $groupBy = $this->getGroupBy($configuration);

        $queryBuilder = $this->entityManager->getConnection()->createQueryBuilder();

        $queryBuilder
            ->select('DATE(o.checkout_completed_at) as date', 'COUNT(o.id) as "Number of orders"')
            ->from($this->entityManager->getClassMetadata(OrderInterface::class)->getTableName(), 'o')
            ->where($queryBuilder->expr()->gte('o.checkout_completed_at', ':from'))
            ->andWhere($queryBuilder->expr()->lte('o.checkout_completed_at', ':to'))
            ->setParameter('from', $configuration['start']->format('Y-m-d H:i:s'))
            ->setParameter('to', $configuration['end']->format('Y-m-d H:i:s'))
            ->groupBy($groupBy)
            ->orderBy($groupBy)
        ;

        return $queryBuilder
            ->execute()
            ->fetchAll()
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return NumberOfOrdersType::class;
    }
}
