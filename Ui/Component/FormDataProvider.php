<?php
declare(strict_types=1);
/**
 * Copyright © Agile Codex Ltd. All rights reserved.
 * @website www.agilecodex.com
 */

namespace Acx\UiForm\Ui\Component;

use Magento\Ui\DataProvider\Modifier\PoolInterface;
use Magento\Ui\DataProvider\ModifierPoolDataProvider;
use Acx\UiForm\Model\User;
use Acx\UiForm\Model\ResourceModel\User\CollectionFactory as UserCollectionFactory;

class FormDataProvider extends ModifierPoolDataProvider
{
    /** @var array */
    private $formData;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        UserCollectionFactory $collectionFactory,
        array $meta = [],
        array $data = [],
        PoolInterface $pool = null
    ) {
        $this->collection = $collectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data, $pool);
    }

    public function getData()
    {
        if (isset($this->formData)) {
            return $this->formData;
        }

        $items = $this->collection->getItems();
        /** @var User $user */
        foreach ($items as $user) {
            $this->formData[$user->getId()] = $user->getData();
        }

        return $this->formData;
    }
}