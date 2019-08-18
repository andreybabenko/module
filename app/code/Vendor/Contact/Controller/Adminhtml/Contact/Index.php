<?php
namespace Vendor\Contact\Controller\Adminhtml\Contact;

use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpGetActionInterface;

/**
 * Class Index
 * @package Vendor\Contact\Controller\Adminhtml\Contact
 */
class Index extends Action implements HttpGetActionInterface
{
    /**
     * @var string
     */
    const ADMIN_RESOURCE = 'Vendor_Contact::manage';

    /**
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $resultPage = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_PAGE);
        $resultPage->addBreadcrumb(__('All Contacts'), __('All Contacts'));
        $resultPage->getConfig()->getTitle()->prepend(__('All Contacts'));

        return $resultPage;
    }
}