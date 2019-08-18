<?php
namespace Vendor\Contact\Controller\Adminhtml\Contact;

use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\LocalizedException;
use Vendor\Contact\Api\Data\ContactInterface;
use Vendor\Contact\Controller\Adminhtml\AbstractContact;

/**
 * Class ChangeStatus
 * @package Vendor\Contact\Controller\Adminhtml\Contact
 */
class ChangeStatus extends AbstractContact
{
    /**
     * @return ResultInterface
     */
    public function execute()
    {
        $contactId = $this->_request->getParam('id');
        $status = $this->getRequest()->getParam('status', ContactInterface::STATUS_NOT_ANSWERED);
        $result = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_REDIRECT);

        if ($contactId) {
            try {
                /* @var ContactInterface $contact */
                $contact = $this->contactRepository->getById($contactId);
                $contact->setStatus($status);
                $this->contactRepository->save($contact);
                $this->messageManager->addSuccessMessage('Status was changed successfully');
            } catch (LocalizedException $localizedException) {
                $this->messageManager->addErrorMessage($localizedException->getMessage());
            }

            return $result->setPath('*/*/edit', [
                    'id' => $contactId
                ]
            );
        }

        return $result->setPath('*/index/index');
    }
}