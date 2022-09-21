<?php
declare(strict_types=1);

namespace Acx\UiForm\Controller\Adminhtml\User;

use Magento\Backend\App\Action as AppAction;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Acx\UiForm\Model\UserFactory;
use Acx\UiForm\Model\UserRepository;

class Save extends AppAction implements HttpPostActionInterface
{
    /** @var UserRepository */
    private $userRepository;

    /** @var UserFactory */
    private $userFactory;

    public function __construct(
        Context $context,
        UserRepository $userRepository,
        UserFactory $userFactory
    ) {
        AppAction::__construct($context);
        $this->userRepository = $userRepository;
        $this->userFactory = $userFactory;
    }

    /**
     * Save action
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();

        $params = $this->getRequest()->getParams();

        if ($params) {
            if ( (int)$params['user_id'] > 0 ) {
                $user = $this->userRepository->getById(
                    (int)$params['user_id']
                );
            } else {
                $user = $this->userFactory->create();
                unset($params['user_id']);
            }

            $user->setData($params);

            $this->userRepository->save($user);
            $this->messageManager->addSuccessMessage(__('User was successfully saved.'));

            $resultRedirect->setPath('*/*/index');
        } else {
            $resultRedirect->setPath('*/*/');
        }
        return $resultRedirect;
    }
}
