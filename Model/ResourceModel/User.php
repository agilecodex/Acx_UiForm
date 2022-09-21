<?php
/**
 *  Copyright © Agile Codex Ltd. All rights reserved.
 *  License:    https://www.agilecodex.com/license-agreement
 */
namespace Acx\UiForm\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * UiForm user model
 */
class User extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('uiform_user', 'user_id');
    }
}