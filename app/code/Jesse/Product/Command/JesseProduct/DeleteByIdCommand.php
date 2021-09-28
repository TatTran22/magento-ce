<?php

namespace Jesse\Product\Command\JesseProduct;

use Exception;
use Jesse\Product\Api\Data\JesseProductInterface;
use Jesse\Product\Api\DeleteJesseProductByIdInterface;
use Jesse\Product\Model\JesseProductModel;
use Jesse\Product\Model\JesseProductModelFactory;
use Jesse\Product\Model\ResourceModel\JesseProductResource;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Psr\Log\LoggerInterface;

/**
 * Delete JesseProduct by id Command.
 */
class DeleteByIdCommand implements DeleteJesseProductByIdInterface
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
     * @param LoggerInterface $logger
     * @param JesseProductModelFactory $modelFactory
     * @param JesseProductResource $resource
     */
    public function __construct(
        LoggerInterface          $logger,
        JesseProductModelFactory $modelFactory,
        JesseProductResource     $resource
    )
    {
        $this->logger = $logger;
        $this->modelFactory = $modelFactory;
        $this->resource = $resource;
    }

    /**
     * @inheritDoc
     */
    public function execute(int $entityId): void
    {
        try {
            /** @var JesseProductModel $model */
            $model = $this->modelFactory->create();
            $this->resource->load($model, $entityId, JesseProductInterface::JESSE_PRODUCT_ID);

            if (!$model->getData(JesseProductInterface::JESSE_PRODUCT_ID)) {
                throw new NoSuchEntityException(
                    __('Could not find JesseProduct with id: `%id`',
                        [
                            'id' => $entityId
                        ]
                    )
                );
            }

            $this->resource->delete($model);
        } catch (Exception $exception) {
            $this->logger->error(
                __('Could not delete JesseProduct. Original message: {message}'),
                [
                    'message' => $exception->getMessage(),
                    'exception' => $exception
                ]
            );
            throw new CouldNotDeleteException(__('Could not delete JesseProduct.'));
        }
    }
}
