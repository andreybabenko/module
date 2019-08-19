<?php

namespace Vendor\Contact\Api\Data;

/**
 * Interface ContactInterface
 * @package Vendor\Contact\Api\Data
 */
interface ContactInterface
{
    const ID = 'entity_id';
    const EMAIL = 'email';
    const NAME = 'name';
    const TELEPHONE = 'telephone';
    const COMMENT = 'comment';
    const STATUS = 'status';

    /**
     * @var int
     */
    const STATUS_ANSWERED = 1;

    /**
     * @var int
     */
    const STATUS_NOT_ANSWERED = 0;

    /**
     * Get contact id
     *
     * @return int
     */
    public function getId();

    /**
     * Set contact id
     *
     * @param int $id
     *
     */
    public function setId($id);

    /**
     * Get contact email
     *
     * @return string
     */
    public function getEmail();

    /**
     * Set customer email
     *
     * @param string $email
     *
     * @return $this
     */
    public function setEmail(string $email);

    /**
     * Return contact name
     *
     * @return string
     */
    public function getName();


    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName(string $name);

    /**
     * Get contact telephone
     *
     * @return string
     */
    public function getTelephone();

    /**
     * Set contact telephone
     *
     * @param string $telephone
     *
     * @return $this
     */
    public function setTelephone(string $telephone);

    /**
     * Get contact comment
     *
     * @return string
     */
    public function getComment();

    /**
     * Set contact comment
     *
     * @param string $comment
     *
     * @return $this
     */
    public function setComment(string $comment);

    /**
     * Return contact status
     *
     * @return int
     */
    public function getStatus();

    /**
     * Set contact status
     *
     * @param int $status
     *
     * @return $this
     */
    public function setStatus(int $status);

    /**
     * @return bool
     */
    public function isAnswered();
}