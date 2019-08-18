<?php
namespace Vendor\Contact\Model;

use Vendor\Contact\Api\Data\ContactInterface;

/**
 * Class Contact
 * @package Vendor\Contact\Model
 */
class Contact extends \Magento\Framework\Model\AbstractModel implements ContactInterface
{
    /**
     * @var string
     */
    const REGISTRY_CODE = 'current_contact';

    /**
     * @return void
     */
    public function _construct()
    {
        $this->_init(\Vendor\Contact\Model\ResourceModel\Contact::class);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->getData(self::ID);
    }

    /**
     * @param int $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->setData(self::ID, $id);

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->getData(self::EMAIL);
    }

    /**
     * @param string $email
     *
     * @return $this
     */
    public function setEmail(string $email)
    {
        $this->setData(self::EMAIL, $email);

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName(string $name)
    {
        $this->setData(self::NAME, $name);

        return $this;
    }

    /**
     * @return string
     */
    public function getTelephone()
    {
        return $this->getData(self::TELEPHONE);
    }

    /**
     * @param string $telephone
     *
     * @return $this
     */
    public function setTelephone(string $telephone)
    {
        $this->setData(self::TELEPHONE, $telephone);

        return $this;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->getData(self::COMMENT);
    }

    /**
     * @param string $comment
     *
     * @return $this
     */
    public function setComment(string $comment)
    {
        $this->setData(self::COMMENT, $comment);

        return $this;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->getData(self::STATUS);
    }

    /**
     * @param int $status
     *
     * @return $this
     */
    public function setStatus(int $status)
    {
        $this->setData(self::STATUS, $status);

        return $this;
    }
}