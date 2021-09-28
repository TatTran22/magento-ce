<?php

namespace Jesse\Product\Command\JesseProduct;

use Exception;
use Jesse\Product\Api\Data\JesseProductInterface;
use Jesse\Product\Api\SaveJesseProductInterface;
use Jesse\Product\Model\JesseProductModel;
use Jesse\Product\Model\JesseProductModelFactory;
use Jesse\Product\Model\ResourceModel\JesseProductResource;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Serialize\Serializer\Json;
use Psr\Log\LoggerInterface;

/**
 * Save JesseProduct Command.
 */
class SaveCommand implements SaveJesseProductInterface
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var JesseProductModelFactory
     */
    private $modelFactory;

    /**
     * @var JesseProductResource
     */
    private $resource;

    /**
     * @var Json
     */
    private $json;

    /**
     * @param LoggerInterface $logger
     * @param JesseProductModelFactory $modelFactory
     * @param JesseProductResource $resource
     * @param Json $json
     */
    public function __construct(
        LoggerInterface          $logger,
        JesseProductModelFactory $modelFactory,
        JesseProductResource     $resource,
        Json $json
    )
    {
        $this->logger = $logger;
        $this->modelFactory = $modelFactory;
        $this->resource = $resource;
        $this->json = $json;
    }

    /**
     * @inheritDoc
     */
    public function execute(JesseProductInterface $jesseProduct): int
    {
        try {
            /** @var JesseProductModel $model */
            $model = $this->modelFactory->create();
            $model->addData($jesseProduct->getData());
            $model->setHasDataChanges(true);

            if (!$model->getData(JesseProductInterface::JESSE_PRODUCT_ID)) {
                $model->isObjectNew(true);
            }
            $this->resource->save($model);
        } catch (Exception $exception) {
            $this->logger->error(
                __('Could not save JesseProduct. Original message: {message}'),
                [
                    'message' => $exception->getMessage(),
                    'exception' => $exception
                ]
            );
            throw new CouldNotSaveException(__('Could not save JesseProduct.'));
        }
        return (int)$model->getData(JesseProductInterface::JESSE_PRODUCT_ID);
    }
}
