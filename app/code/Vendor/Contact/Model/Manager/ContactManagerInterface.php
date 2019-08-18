<?php
namespace Vendor\Contact\Model\Manager;

use Magento\Framework\Exception\LocalizedException;
use Vendor\Contact\Api\Data\ContactInterface;

/**
 * Interface ContactManagerInterface
 * @package Vendor\Contact\Model\Manager
 */
interface ContactManagerInterface
{
    /**
     * @param array $data
     *
     * @return ContactInterface|void
     *
     * @throws LocalizedException
     */
    public function saveContact(array $data);
}