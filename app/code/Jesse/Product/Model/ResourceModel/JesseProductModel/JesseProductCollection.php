<?php

namespace Jesse\Product\Model\ResourceModel\JesseProductModel;

use Jesse\Product\Model\JesseProductModel;
use Jesse\Product\Model\ResourceModel\JesseProductResource;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class JesseProductCollection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'jesse_product_collection';

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(JesseProductModel::class, JesseProductResource::class);
    }
}
