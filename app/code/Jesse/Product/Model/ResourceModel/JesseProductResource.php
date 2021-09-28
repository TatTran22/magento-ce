<?php

namespace Jesse\Product\Model\ResourceModel;

use Jesse\Product\Api\Data\JesseProductInterface;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class JesseProductResource extends AbstractDb
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'jesse_product_resource_model';

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init('jesse_product', JesseProductInterface::JESSE_PRODUCT_ID);
        $this->_useIsObjectNew = true;
    }
}
