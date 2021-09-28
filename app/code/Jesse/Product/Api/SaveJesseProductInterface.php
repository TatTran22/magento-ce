<?php

namespace Jesse\Product\Api;

use Jesse\Product\Api\Data\JesseProductInterface;
use Magento\Framework\Exception\CouldNotSaveException;

/**
 * Save JesseProduct Command.
 *
 * @api
 */
interface SaveJesseProductInterface
{
    /**
     * Save JesseProduct.
     * @param \Jesse\Product\Api\Data\JesseProductInterface $jesseProduct
     * @return int
     * @throws CouldNotSaveException
     */
    public function execute(JesseProductInterface $jesseProduct): int;
}
