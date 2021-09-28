<?php

namespace Jesse\Product\Block\Form\JesseProduct;

use Jesse\Product\Api\Data\JesseProductInterface;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Delete entity button.
 */
class Delete extends GenericButton implements ButtonProviderInterface
{
    /**
     * Retrieve Delete button settings.
     *
     * @return array
     */
    public function getButtonData(): array
    {
        return $this->wrapButtonSettings(
            'Delete',
            'delete',
            'deleteConfirm(\''
            . __('Are you sure you want to delete this jesseproduct?')
            . '\', \'' . $this->getUrl(
                '*/*/delete',
                [JesseProductInterface::JESSE_PRODUCT_ID => $this->getJesseProductId()]
            ) . '\')',
            [],
            20
        );
    }
}
