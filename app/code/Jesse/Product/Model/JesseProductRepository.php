<?php

namespace Jesse\Product\Model;

use Jesse\Product\Api\Data\JesseProductInterface;
use Jesse\Product\Api\Data\JesseProductInterfaceFactory;
use Jesse\Product\Api\SaveJesseProductInterface;
use Magento\Framework\DataObject;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Serialize\Serializer\Json;
use Magento\Framework\Webapi\Rest\Request;
use Psr\Log\LoggerInterface;

class JesseProductRepository implements \Jesse\Product\Api\JesseProductRepositoryInterface
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var ResourceModel\JesseProductResource
     */
    private $resource;

    /**
     * @var JesseProductInterfaceFactory
     */
    private $entityDataFactory;

    /**
     * @var SaveJesseProductInterface
     */
    private $saveCommand;

    /**
     * @var Json
     */
    private $json;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * UserProfileRepository constructor.
     *
     * @param Request $request
     * @param ResourceModel\JesseProductResource $resource
     * @param SaveJesseProductInterface $saveCommand
     * @param JesseProductInterfaceFactory $entityDataFactory
     * @param Json $json
     * @param LoggerInterface $logger
     */
    public function __construct(
        Request                            $request,
        ResourceModel\JesseProductResource $resource,
        SaveJesseProductInterface          $saveCommand,
        JesseProductInterfaceFactory       $entityDataFactory,
        Json                               $json,
        LoggerInterface                    $logger
    )
    {
        $this->request = $request;
        $this->resource = $resource;
        $this->saveCommand = $saveCommand;
        $this->entityDataFactory = $entityDataFactory;
        $this->json = $json;
        $this->logger = $logger;
    }

    /**
     * @inheritDoc
     */
    public function save(): array
    {
        $params = $this->request->getBodyParams();
        try {
            /** @var JesseProductInterface|DataObject $entityModel */
            $entityModel = $this->entityDataFactory->create();
            $entityModel->addData($params['data']);
            $jpId = $this->saveCommand->execute($entityModel);
        } catch (CouldNotSaveException $exception) {
            $result = [
                'success' => false,
                'message' => $exception->getMessage()
            ];
            $this->logger->info(__('There are an error during save Jesse Product using API. Body params: %1. Result: %2', $this->json->serialize($params), $this->json->serialize($result)));
            return [$result];
        }
        $result = [
            'success' => true,
            'Jesse Product Id' => $jpId
        ];
        $this->logger->info(__('Successfully save Jesse Product using API. Body params: %1. Result: %2', $this->json->serialize($params), $this->json->serialize($result)));
        return [$result];
    }

    /**
     * @inheritDoc
     */
    public function get(int $entityId): JesseProductInterface
    {
        // TODO: Implement get() method.
    }

    /**
     * @inheritDoc
     */
    public function getByUserId(int $jesseProductId): JesseProductInterface
    {
        // TODO: Implement getByUserId() method.
    }
}
