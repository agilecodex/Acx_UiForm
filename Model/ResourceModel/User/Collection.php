<?php

namespace Acx\UiForm\Model\ResourceModel\User;

use Acx\UiForm\Model\ResourceModel\User as UserResourceModel;
use Acx\UiForm\Model\User as UserModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * CMS User Collection
 */
class Collection extends AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(UserModel::class,
            UserResourceModel::class);
    }
}
