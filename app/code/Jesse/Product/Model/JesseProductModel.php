<?php

namespace Jesse\Product\Model;

use Jesse\Product\Model\ResourceModel\JesseProductResource;
use Magento\Framework\Model\AbstractModel;

class JesseProductModel extends AbstractModel
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'jesse_product_model';

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(JesseProductResource::class);
    }

}
