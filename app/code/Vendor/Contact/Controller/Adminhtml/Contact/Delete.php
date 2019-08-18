<?php
namespace Vendor\Contact\Controller\Adminhtml\Contact;

use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Exception\LocalizedException;
use Vendor\Contact\Controller\Adminhtml\AbstractContact;

/**
 * Class Delete
 * @package Vendor\Contact\Controller\Adminhtml\Contact
 */
class Delete extends AbstractContact
{
    /**
     * @return Redirect
     */
    public function execute()
    {
        $contactId = $this->_request->getParam('id');
        $result = $this->resultRedirectFactory->create();

        if ($contactId) {
            try {
                $this->contactRepository->deleteById($contactId);
                $this->messageManager->addSuccessMessage('Contact was deleted');
            } catch (LocalizedException $localizedException) {
                $this->messageManager->addErrorMessage($localizedException->getMessage());
            }
        }

        return $result->setPath('*/contact/index');
    }
}