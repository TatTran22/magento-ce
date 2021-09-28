<?php

namespace Jesse\Product\Mapper;

use Jesse\Product\Api\Data\JesseProductInterface;
use Jesse\Product\Api\Data\JesseProductInterfaceFactory;
use Jesse\Product\Model\JesseProductModel;
use Magento\Framework\DataObject;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Converts a collection of JesseProduct entities to an array of data transfer objects.
 */
class JesseProductDataMapper
{
    /**
     * @var JesseProductInterfaceFactory
     */
    private $entityDtoFactory;

    /**
     * @param JesseProductInterfaceFactory $entityDtoFactory
     */
    public function __construct(
        JesseProductInterfaceFactory $entityDtoFactory
    )
    {
        $this->entityDtoFactory = $entityDtoFactory;
    }

    /**
     * Map magento models to DTO array.
     *
     * @param AbstractCollection $collection
     *
     * @return array|JesseProductInterface[]
     */
    public function map(AbstractCollection $collection): array
    {
        $results = [];
        /** @var JesseProductModel $item */
        foreach ($collection->getItems() as $item) {
            /** @var JesseProductInterface|DataObject $entityDto */
            $entityDto = $this->entityDtoFactory->create();
            $entityDto->addData($item->getData());

            $results[] = $entityDto;
        }

        return $results;
    }
}
