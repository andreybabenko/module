<?php
namespace Vendor\Contact\Model\ResourceModel\Contact;

use Vendor\Contact\Api\Data\ContactInterface;

/**
 * Class Collection
 * @package Vendor\Contact\Model\ResourceModel\Contact
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = ContactInterface::ID;

    /**
     * Initialize resource collection.
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init(
            \Vendor\Contact\Model\Contact::class,
            \Vendor\Contact\Model\ResourceModel\Contact::class
        );
    }
}