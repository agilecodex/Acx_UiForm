<?php
/**
 *  Copyright © Agile Codex Ltd. All rights reserved.
 *  License:    https://www.agilecodex.com/license-agreement
 */
namespace Acx\UiForm\Api\Data;

/**
 * UiForm user interface.
 * @api
 * @since 1.0.0
 */
interface UserInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ID      = 'user_id';
    const NAME   = 'user_name';
    const ROLE    = 'user_role';
    const ADDRESS = 'user_address';

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Get User name
     *
     * @return string|null
     */
    public function getName();

    /**
     * Get role
     *
     * @return string|null
     */
    public function getRole();

    /**
     * Get address
     *
     * @return string|null
     */
    public function getAddress();

    /**
     * Set ID
     *
     * @param int $id
     * @return UserInterface
     */
    public function setId($id);

    /**
     * Set name
     *
     * @param string $name
     * @return UserInterface
     */
    public function setName($name);

    /**
     * Set role
     *
     * @param string $role
     * @return UserInterface
     */
    public function setRole($role);

    /**
     * Set address
     *
     * @param string $address
     * @return UserInterface
     */
    public function setAddress($address);
}
