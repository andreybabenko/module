<?php
namespace Vendor\Contact\Controller\Adminhtml\Contact;

use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Exception\LocalizedException;
use Vendor\Contact\Api\Data\ContactInterface;
use Vendor\Contact\Controller\Adminhtml\AbstractContact;

/**
 * Class Answer
 * @package Vendor\Contact\Controller\Adminhtml\Contact
 */
class Answer extends AbstractContact
{
    /**
     * @return ResponseInterface|Redirect
     */
    public function execute()
    {
        $contactId = $this->_request->getParam(ContactInterface::ID);
        $answer = $this->getRequest()->getParam('answer', '');
        $result = $this->resultRedirectFactory->create();

        if ($answer) {
            try {
                /* @var ContactInterface $contact */
                $contact = $this->contactRepository->getById($contactId);
                $email = $contact->getEmail();
                //TODO Implement sending answer

                $contact->setStatus(ContactInterface::STATUS_ANSWERED);
                $this->contactRepository->save($contact);
                $this->messageManager->addSuccessMessage('Email was send');
            } catch (LocalizedException $localizedException) {
                $this->messageManager->addErrorMessage($localizedException->getMessage());
            }
        } else {
            $this->messageManager->addErrorMessage('Answer should not be empty');
        }

        return $result->setPath('*/*/index');
    }
}