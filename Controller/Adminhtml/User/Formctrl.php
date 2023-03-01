<?php
namespace Project\Cv\Controller\Adminhtml\User;

class Formctrl extends \Magento\Backend\App\Action
{
    protected $_pageFactory;
    public function __construct(
       \Magento\Backend\App\Action\Context $context,
       \Magento\Framework\View\Result\PageFactory $pageFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }
    public function execute()
    {
         /** @var \Magento\Framework\View\Result\Page $resultPage */
         $resultPage = $this->_pageFactory->create();
         $resultPage->getConfig()->getTitle()->prepend(__('Form Controller'));

         return $resultPage;
    }
}
