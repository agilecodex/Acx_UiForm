<?php
declare(strict_types=1);

namespace Acx\UiForm\Api;

use Acx\UiForm\Api\Data\UserInterface;

interface UserRepositoryInterface
{
    /**
     * @param UserInterface $user
     * @return void
     */
    public function save(UserInterface $user);

    /**
     * @param $userId
     * @return \Acx\UiForm\Api\Data\UserInterface
     */
    public function getById($userId);

    /**
     * @param UserInterface $user
     * @return void
     */
    public function delete(UserInterface $user);

    /**
     * @param $userId
     * @return void
     */
    public function deleteById($userId);
}
