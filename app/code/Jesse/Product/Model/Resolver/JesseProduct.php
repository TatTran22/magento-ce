<?php

declare(strict_types=1);

namespace Jesse\Product\Model\Resolver;

use Jesse\Product\Api\Data\JesseProductInterface;
use Jesse\Product\Model\JesseProductModelFactory;
use Jesse\Product\Model\ResourceModel\JesseProductResource;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\Resolver\ContextInterface;
use Magento\Framework\GraphQl\Query\Resolver\Value;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Framework\Serialize\Serializer\Json;
use Psr\Log\LoggerInterface;

class JesseProduct implements ResolverInterface
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
        Json                     $json
    )
    {
        $this->logger = $logger;
        $this->modelFactory = $modelFactory;
        $this->resource = $resource;
        $this->json = $json;
    }

    /**
     * @param Field $field
     * @param ContextInterface $context
     * @param ResolveInfo $info
     * @param array|null $value
     * @param array|null $args
     * @return Value|mixed
     */
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        $model = $this->modelFactory->create();
        $this->resource->load($model, $args['jesse_product_id'], JesseProductInterface::JESSE_PRODUCT_ID);

        return $model->getData();
    }
}
