<?php

namespace Jesse\Product\Model;

use Jesse\Product\Api\Data\JesseProductSearchResultsInterface;
use Magento\Framework\Api\SearchResults;

/**
 * JesseProduct entity search results implementation.
 */
class JesseProductSearchResults extends SearchResults implements JesseProductSearchResultsInterface
{
    /**
     * @inheritDoc
     */
    public function setItems(array $items): JesseProductSearchResultsInterface
    {
        return parent::setItems($items);
    }

    /**
     * @inheritDoc
     */
    public function getItems(): array
    {
        return parent::getItems();
    }
}
