<?php

namespace Jesse\Product\Api;

use Jesse\Product\Api\Data\JesseProductInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

interface JesseProductRepositoryInterface
{
    /**
     * Save Jesse Product
     *
     * @return array
     */
    public function save(): array;

    /**
     * Get Jesse Product
     *
     * @param int $entityId
     * @return JesseProductInterface
     * @throws NoSuchEntityException
     */
    public function get(int $entityId): JesseProductInterface;

    /**
     * Get Jesse Product by Jesse Product ID
     *
     * @param int $jesseProductId
     * @return JesseProductInterface
     * @throws NoSuchEntityException
     */
    public function getByUserId(int $jesseProductId): JesseProductInterface;
}
