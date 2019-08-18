<?php
namespace Vendor\Contact\Model\Manager;

use Magento\Framework\Exception\LocalizedException;
use Vendor\Contact\Api\Data\ContactInterface;

/**
 * Class ContactManager
 * @package Vendor\Contact\Model\Manager
 */
class ContactManager implements ContactManagerInterface
{

    /**
     * @var \Magento\Framework\Api\DataObjectHelper
     */
    private $_dataObjectHelper;

    /**
     * @var \Vendor\Contact\Api\Data\ContactInterfaceFactory
     */
    private $_contactFactory;

    /**
     * @var \Vendor\Contact\Api\ContactRepositoryInterface
     */
    private $_contactRepository;

    /**
     * ContactManager constructor
     */
    public function __construct(
        \Magento\Framework\Api\DataObjectHelper $dataObjectHelper,
        \Vendor\Contact\Api\Data\ContactInterfaceFactory $contactFactory,
        \Vendor\Contact\Api\ContactRepositoryInterface $contactRepository
    )
    {
        $this->_dataObjectHelper = $dataObjectHelper;
        $this->_contactFactory = $contactFactory;
        $this->_contactRepository = $contactRepository;
    }

    /**
     * @param array $data
     *
     * @return ContactInterface|void
     *
     * @throws LocalizedException
     */
    public function saveContact(array $data)
    {
        try {
            $contact = $this->_contactFactory->create();
            $this->_dataObjectHelper->populateWithArray(
                $contact,
                $data,
                \Vendor\Contact\Api\Data\ContactInterface::class
            );

            $savedContact = $this->_contactRepository->save($contact);
        } catch (\Exception $exception) {
            throw new LocalizedException(__('Unable to save contact'));
        }

        return $savedContact;
    }
}