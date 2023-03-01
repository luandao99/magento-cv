<?php

namespace Project\Cv\Controller\Adminhtml\User;

use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Controller\ResultFactory;
use Project\Cv\Model\ResourceModel\User\CollectionFactory;

class MassStatus extends \Magento\Backend\App\Action
{
    public $collectionFactory;
    public $filter;

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     */
    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        Filter $filter,
        CollectionFactory $collectionFactory
    ) {
        $this->_pageFactory = $pageFactory;
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        return parent::__construct($context);
    }

    /**
     * Index action
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        try {
            $collection = $this->filter->getCollection($this->collectionFactory->create());
            $status = $this->getRequest()->getParam('status');
            $statusLabel = $status ? "enabled" : "disabled";
            $count = 0;
            foreach ($collection as $model) {
                $model->setStatus($status);
                $model->save();
                $count++;
            }
            //  var_dump($model);
            // die();

            $this->messageManager->addSuccess(__('A total of %1 blog(s) have been %2.', $count, $statusLabel));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('*/*/index');
    }
}
