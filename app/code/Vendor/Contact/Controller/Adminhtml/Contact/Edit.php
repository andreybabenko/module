<?php
namespace Vendor\Contact\Controller\Adminhtml\Contact;

use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\Page;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Vendor\Contact\Controller\Adminhtml\AbstractContact;
use Vendor\Contact\Model\Contact;

/**
 * Class Edit
 * @package Vendor\Contact\Controller\Adminhtml\Contact
 */
class Edit extends AbstractContact implements HttpGetActionInterface
{
    /**
     * @var \Magento\Framework\Registry
     */
    private $_coreRegistry;

    /**
     * Edit constructor.
     *
     * @param Action\Context $context
     * @param \Vendor\Contact\Api\ContactRepositoryInterface $contactRepository
     * @param \Magento\Framework\Registry $coreRegistry
     */
    public function __construct(
        Action\Context $context,
        \Vendor\Contact\Api\ContactRepositoryInterface $contactRepository,
        \Magento\Framework\Registry $coreRegistry
    )
    {
        parent::__construct($context, $contactRepository);

        $this->_coreRegistry = $coreRegistry;
    }

    /**
     * @return Page|Redirect
     */
    public function execute()
    {
        $contactId = (int)$this->getRequest()->getParam('id');

        try {
            $contact = $this->contactRepository->getById($contactId);
            $this->_coreRegistry->register(Contact::REGISTRY_CODE, $contact);
        } catch (NoSuchEntityException $noSuchEntityException) {
            /** @var Redirect $resultRedirect */
            $resultRedirect = $this->resultRedirectFactory->create();
            $this->messageManager->addErrorMessage($noSuchEntityException->getMessage());

            return $resultRedirect->setPath('vendor_contact/*/*');
        }
        /** @var Page $resultPage */
        $resultPage = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_PAGE);
        $resultPage->getConfig()->getTitle()->prepend($contact->getName());

        return $resultPage;
    }
}