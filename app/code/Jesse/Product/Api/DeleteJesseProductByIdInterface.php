<?php

namespace Jesse\Product\Api;

use Magento\Framework\Exception\CouldNotDeleteException;

/**
 * Delete JesseProduct by id Command.
 *
 * @api
 */
interface DeleteJesseProductByIdInterface
{
    /**
     * Delete JesseProduct.
     * @param int $entityId
     * @return void
     * @throws CouldNotDeleteException
     */
    public function execute(int $entityId): void;
}
