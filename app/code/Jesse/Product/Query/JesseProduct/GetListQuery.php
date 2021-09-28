<?php

namespace Jesse\Product\Query\JesseProduct;

use Jesse\Product\Api\Data\JesseProductSearchResultsInterface;
use Jesse\Product\Api\Data\JesseProductSearchResultsInterfaceFactory;
use Jesse\Product\Api\GetJesseProductListInterface;
use Jesse\Product\Mapper\JesseProductDataMapper;
use Jesse\Product\Model\ResourceModel\JesseProductModel\JesseProductCollection;
use Jesse\Product\Model\ResourceModel\JesseProductModel\JesseProductCollectionFactory;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;

/**
 * Get JesseProduct list by search criteria query.
 */
class GetListQuery implements GetJesseProductListInterface
{
    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**
     * @var JesseProductCollectionFactory
     */
    private $entityCollectionFactory;

    /**
     * @var JesseProductDataMapper
     */
    private $entityDataMapper;

    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    /**
     * @var JesseProductSearchResultsInterfaceFactory
     */
    private $searchResultFactory;

    /**
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JesseProductCollectionFactory $entityCollectionFactory
     * @param JesseProductDataMapper $entityDataMapper
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param JesseProductSearchResultsInterfaceFactory $searchResultFactory
     */
    public function __construct(
        CollectionProcessorInterface              $collectionProcessor,
        JesseProductCollectionFactory             $entityCollectionFactory,
        JesseProductDataMapper                    $entityDataMapper,
        SearchCriteriaBuilder                     $searchCriteriaBuilder,
        JesseProductSearchResultsInterfaceFactory $searchResultFactory
    )
    {
        $this->collectionProcessor = $collectionProcessor;
        $this->entityCollectionFactory = $entityCollectionFactory;
        $this->entityDataMapper = $entityDataMapper;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->searchResultFactory = $searchResultFactory;
    }

    /**
     * @inheritDoc
     */
    public function execute(?SearchCriteriaInterface $searchCriteria = null): JesseProductSearchResultsInterface
    {
        /** @var JesseProductCollection $collection */
        $collection = $this->entityCollectionFactory->create();

        if ($searchCriteria === null) {
            $searchCriteria = $this->searchCriteriaBuilder->create();
        } else {
            $this->collectionProcessor->process($searchCriteria, $collection);
        }

        $entityDataObjects = $this->entityDataMapper->map($collection);

        /** @var JesseProductSearchResultsInterface $searchResult */
        $searchResult = $this->searchResultFactory->create();
        $searchResult->setItems($entityDataObjects);
        $searchResult->setTotalCount($collection->getSize());
        $searchResult->setSearchCriteria($searchCriteria);

        return $searchResult;
    }
}
