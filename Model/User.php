<?php

namespace Project\Cv\Model;
use Project\Cv\Model\ResourceModel\User as UserResourceModel;

class User extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init(UserResourceModel::class);
    }
}
