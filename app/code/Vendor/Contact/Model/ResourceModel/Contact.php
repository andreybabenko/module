<?php
namespace Vendor\Contact\Model\ResourceModel;

use Vendor\Contact\Api\Data\ContactInterface;

/**
 * Class Contact
 * @package Vendor\Contact\Model\ResourceModel
 */
class Contact  extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * @var string
     */
    protected $_idFieldName = ContactInterface::ID;

    /**
     * Construct action
     */
    protected function _construct()
    {
        $this->_init('vendor_contact', $this->_idFieldName);
    }
}