<?php

namespace Project\Cv\Controller\Adminhtml\News;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Project\Cv\Model\UserFactory;

class Save extends \Magento\Backend\App\Action
{
    protected $resultPageFactory = false;
    protected $postFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        UserFactory $postFactory

    ) {
        $this->postFactory = $postFactory;
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {

        $data = $this->getRequest()->getPostValue();
        $getUrlImage = $this->getRequest()->getParam('head_shortcut_icon');
        $urlImage = $getUrlImage[0]['url'];
        $data['avatar'] = $urlImage;
        unset($data['head_shortcut_icon']);
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam('user_id');
        // var_dump($data);
        // die();
        try {
            /** @var \Magento\Cms\Model\Page $model */
            if (isset($id) && !empty($id)) {
                $model = $this->postFactory->create()->load($id);
                $model->addData($data);
                $model->save();
            } else {
                $model = $this->postFactory->create();
                $model->setData($data);
                $model->save();
            }


            $this->messageManager->addSuccessMessage(__('You saved the User.'));
        } catch (\Exception $e) {
            $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the User.'));
        }
        return $resultRedirect->setPath('*/*/');
    }
}
