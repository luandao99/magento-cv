<?php
namespace Project\Cv\Model\ResourceModel;

class User extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('Cv_user', 'user_id');
    }
}
