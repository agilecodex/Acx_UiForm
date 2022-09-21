<?php
declare(strict_types=1);
/**
 * Copyright © Agile Codex Ltd. All rights reserved.
 * License:    https://www.agilecodex.com/license-agreement
 */
namespace Acx\UiForm\Model;

use Acx\UiForm\Api\Data\UserInterface;
use Acx\UiForm\Model\ResourceModel\User as UserResourceModel;
use Magento\Framework\Model\AbstractModel;

/**
 * User model
 */
class User extends AbstractModel implements UserInterface
{
    /**
     * Construct.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(UserResourceModel::class);
    }

    /**
     * Retrieve block id
     *
     * @return int
     */
    public function getId()
    {
        return $this->getData(self::ID);
    }

    /**
     * Retrieve block identifier
     *
     * @return string
     */
    public function getName()
    {
        return (string)$this->getData(self::NAME);
    }

    /**
     * Retrieve user role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->getData(self::ROLE);
    }

    /**
     * Retrieve user address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->getData(self::ADDRESS);
    }

    /**
     * Set ID
     *
     * @param int $id
     * @return UserInterface
     */
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * Set name
     *
     * @param string $name
     * @return UserInterface
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Set role
     *
     * @param string $role
     * @return UserInterface
     */
    public function setRole($role)
    {
        return $this->setData(self::ROLE, $role);
    }

    /**
     * Set address
     *
     * @param string $address
     * @return UserInterface
     */
    public function setAddress($address)
    {
        return $this->setData(self::ADDRESS, $address);
    }
}
