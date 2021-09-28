<?php

namespace Jesse\Product\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * JesseProduct entity search result.
 */
interface JesseProductSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Set items.
     *
     * @param \Jesse\Product\Api\Data\JesseProductInterface[] $items
     *
     * @return JesseProductSearchResultsInterface
     */
    public function setItems(array $items): JesseProductSearchResultsInterface;

    /**
     * Get items.
     *
     * @return \Jesse\Product\Api\Data\JesseProductInterface[]
     */
    public function getItems(): array;
}
