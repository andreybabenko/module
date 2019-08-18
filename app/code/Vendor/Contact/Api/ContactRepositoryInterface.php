<?php
namespace Vendor\Contact\Api;

use Magento\Framework\Api\Search\SearchResult;
use Magento\Framework\Exception\AlreadyExistsException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Vendor\Contact\Api\Data\ContactInterface;

/**
 * Interface ContactRepositoryInterface
 * @package Vendor\Contact\Api
 */
interface ContactRepositoryInterface
{
    /**
     * Save contact
     *
     * @param ContactInterface $contact
     * @return ContactInterface
     *
     * @throws AlreadyExistsException
     */
    public function save(ContactInterface $contact);

    /**
     * @param $contactId
     *
     * @return ContactInterface
     *
     * @throws NoSuchEntityException
     */
    public function getById($contactId);

    /**
     * @param ContactInterface $contact
     *
     * @return void
     */
    public function delete(ContactInterface $contact);

    /**
     * @param $contactId
     *
     * @throws LocalizedException
     */
    public function deleteById($contactId);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return SearchResult
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);
}