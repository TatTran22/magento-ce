<?php

namespace Jesse\Product\Api;

use Jesse\Product\Api\Data\JesseProductSearchResultsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Get JesseProduct list by search criteria query.
 *
 * @api
 */
interface GetJesseProductListInterface
{
    /**
     * Get JesseProduct list by search criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface|null $searchCriteria
     * @return \Jesse\Product\Api\Data\JesseProductSearchResultsInterface
     */
    public function execute(?SearchCriteriaInterface $searchCriteria = null): JesseProductSearchResultsInterface;
}
