<?php
declare(strict_types=1);

namespace Acx\UiForm\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Acx\UiForm\Api\Data\UserInterface;
use Acx\UiForm\Api\UserRepositoryInterface;
use Acx\UiForm\Model\UserFactory;
use Acx\UiForm\Model\ResourceModel\User as UserResource;
use Acx\UiForm\Model\ResourceModel\User\CollectionFactory;

class UserRepository implements UserRepositoryInterface
{
    /** @var UserResource */
    protected $resource;

    /** @var UserFactory */
    protected $userFactory;

    /** @var CollectionFactory */
    protected $collectionFactory;

    /** @var CollectionProcessorInterface */
    private $collectionProcessor;

    public function __construct(
        UserResource $resource,
        UserFactory $userFactory,
        CollectionFactory $collectionFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->userFactory = $userFactory;
        $this->collectionFactory = $collectionFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    public function save(UserInterface $user, ?int $storeId = 0)
    {
        try {
            $canNotify = !(bool)$user->getId();

            $this->resource->save($user);

        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $user;
    }

    public function getById($userId)
    {
        $user = $this->userFactory->create();
        $this->resource->load($user, $userId);
        if (!$user->getId()) {
            throw new NoSuchEntityException(__('The user with the "%1" ID doesn\'t exist.', $userId));
        }
        return $user;
    }

    public function delete(UserInterface $user)
    {
        try {
            $this->resource->delete($user);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }

    public function deleteById($userId)
    {
        return $this->delete($this->getById($userId));
    }
}
