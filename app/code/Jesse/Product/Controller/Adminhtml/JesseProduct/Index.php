<?php

namespace Jesse\Product\Controller\Adminhtml\JesseProduct;

use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;

/**
 * JesseProduct backend index (list) controller.
 */
class Index extends Action implements HttpGetActionInterface
{
    /**
     * Authorization level of a basic admin session.
     */
    const ADMIN_RESOURCE = 'Jesse_Product::management';

    /**
     * Execute action based on request and return result.
     *
     * @return ResultInterface|ResponseInterface
     */
    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);

        $resultPage->setActiveMenu('Jesse_Product::management');
        $resultPage->addBreadcrumb(__('JesseProduct'), __('JesseProduct'));
        $resultPage->addBreadcrumb(__('Manage JesseProducts'), __('Manage JesseProducts'));
        $resultPage->getConfig()->getTitle()->prepend(__('JesseProduct List'));

        return $resultPage;
    }
}
