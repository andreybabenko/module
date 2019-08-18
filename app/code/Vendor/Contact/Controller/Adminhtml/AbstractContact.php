<?php
namespace Vendor\Contact\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Vendor\Contact\Api\ContactRepositoryInterface;

/**
 * Class AbstractContact
 * @package Vendor\Contact\Controller\Adminhtml
 */
abstract class AbstractContact extends Action
{
    /**
     * @var ContactRepositoryInterface
     */
    protected $contactRepository;

    /**
     * AbstractContact constructor.
     *
     * @param Action\Context $context
     * @param ContactRepositoryInterface $contactRepository
     */
    public function __construct(
        Action\Context $context,
        ContactRepositoryInterface $contactRepository
    )
    {
        parent::__construct($context);

        $this->contactRepository = $contactRepository;
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    abstract public function execute();
}