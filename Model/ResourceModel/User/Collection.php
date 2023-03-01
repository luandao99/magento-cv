<?php
namespace Project\Cv\Model\ResourceModel\User;
use Project\Cv\Model\User;
use Project\Cv\Model\ResourceModel\User as UserResourceModel;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'user_id';
    protected $_eventPrefix = 'project_cv_user_collection';
    protected $_eventObject = 'user_collection';

    /**
     * Define the resource model & the model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(User::class, UserResourceModel::class);
    }
}
