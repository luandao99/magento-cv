<?php

namespace Project\Cv\Controller\Adminhtml\User;

use Magento\Backend\App\Action\Context;
use Project\Cv\Model\UserFactory;

class Delete extends \Magento\Backend\App\Action
{
    public $userFactory;
    protected $_pageFactory;
    public function __construct(
        Context $context,
        UserFactory $userFactory
    ) {
        $this->userFactory = $userFactory;
        return parent::__construct($context);
    }
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam('user_id');
        try {
            $model = $this->userFactory->create();
            $model->load($id);
            $model->delete();
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }
        return $resultRedirect->setPath('*/*/');
    }
}
