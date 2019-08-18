<?php
namespace Vendor\Contact\Model;

use Magento\Framework\Exception\AlreadyExistsException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Vendor\Contact\Api\ContactRepositoryInterface;
use Vendor\Contact\Api\Data\ContactInterface;

/**
 * Class ContactRepository
 * @package Vendor\Contact\Model
 */
class ContactRepository implements ContactRepositoryInterface
{
    /**
     * @var ResourceModel\Contact
     */
    private $_contactResource;

    /**
     * @var \Vendor\Contact\Model\ContactFactory
     */
    private $_contactFactory;

    /**
     * ContactRepository constructor.
     *
     * @param ResourceModel\Contact $contactResource
     * @param ContactFactory $contactFactory
     */
    public function __construct(
        \Vendor\Contact\Model\ResourceModel\Contact $contactResource,
        \Vendor\Contact\Model\ContactFactory $contactFactory
    )
    {
        $this->_contactResource = $contactResource;
        $this->_contactFactory = $contactFactory;
    }

    /**
     * @param ContactInterface $contact
     *
     * @return ContactInterface
     *
     * @throws AlreadyExistsException
     */
    public function save(ContactInterface $contact)
    {
        /* @var Contact $contact */
        $this->_contactResource->save($contact);

        return $contact;
    }

    /**
     * @param $contactId
     *
     * @return ContactInterface
     *
     * @throws NoSuchEntityException
     */
    public function getById($contactId)
    {
        $contact = $this->_contactFactory->create();
        /* @var Contact $contact */
        $this->_contactResource->load($contact, $contactId);

        if (!$contact->getId()) {
            throw new NoSuchEntityException(__('Contact with id %1 not found', $contactId));
        }

        return $contact;
    }

    public function delete(ContactInterface $contact)
    {
        // TODO: Implement delete() method.
    }

    /**
     * @param $contactId
     *
     * @throws LocalizedException
     */
    public function deleteById($contactId)
    {
        try {
            $contact = $this->getById($contactId);
            $this->_contactResource->delete($contact);
        } catch (\Exception $exception) {
            throw new LocalizedException(__('Unable to delete contact', $exception->getMessage()));
        }
    }

    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        // TODO: Implement getList() method.
    }
}