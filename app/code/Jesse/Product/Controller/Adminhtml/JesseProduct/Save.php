<?php

namespace Jesse\Product\Controller\Adminhtml\JesseProduct;

use Jesse\Product\Api\Data\JesseProductInterface;
use Jesse\Product\Api\Data\JesseProductInterfaceFactory;
use Jesse\Product\Api\SaveJesseProductInterface;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\DataObject;
use Magento\Framework\Exception\CouldNotSaveException;

/**
 * Save JesseProduct controller action.
 */
class Save extends Action implements HttpPostActionInterface
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Jesse_Product::management';

    /**
     * @var DataPersistorInterface
     */
    private $dataPersistor;

    /**
     * @var SaveJesseProductInterface
     */
    private $saveCommand;

    /**
     * @var JesseProductInterfaceFactory
     */
    private $entityDataFactory;

    /**
     * @param Context $context
     * @param DataPersistorInterface $dataPersistor
     * @param SaveJesseProductInterface $saveCommand
     * @param JesseProductInterfaceFactory $entityDataFactory
     */
    public function __construct(
        Context                      $context,
        DataPersistorInterface       $dataPersistor,
        SaveJesseProductInterface    $saveCommand,
        JesseProductInterfaceFactory $entityDataFactory
    )
    {
        parent::__construct($context);
        $this->dataPersistor = $dataPersistor;
        $this->saveCommand = $saveCommand;
        $this->entityDataFactory = $entityDataFactory;
    }

    /**
     * Save JesseProduct Action.
     *
     * @return ResponseInterface|ResultInterface
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $params = $this->getRequest()->getParams();

        try {
            /** @var JesseProductInterface|DataObject $entityModel */
            $entityModel = $this->entityDataFactory->create();
            $entityModel->addData($params['general']);
            $this->saveCommand->execute($entityModel);
            $this->messageManager->addSuccessMessage(
                __('The JesseProduct data was saved successfully')
            );
            $this->dataPersistor->clear('entity');
        } catch (CouldNotSaveException $exception) {
            $this->messageManager->addErrorMessage($exception->getMessage());
            $this->dataPersistor->set('entity', $params);

            return $resultRedirect->setPath('*/*/edit', [
                JesseProductInterface::JESSE_PRODUCT_ID => $this->getRequest()->getParam(JesseProductInterface::JESSE_PRODUCT_ID)
            ]);
        }

        return $resultRedirect->setPath('*/*/');
    }
}
