<?php
namespace Vendor\Contact\Controller\Index;

use Magento\Framework\App\Action\HttpPostActionInterface as HttpPostActionInterface;
use Magento\Contact\Model\ConfigInterface;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Exception\LocalizedException;
use Psr\Log\LoggerInterface;
use Magento\Framework\App\ObjectManager;
use Vendor\Contact\Model\Manager\ContactManagerInterface;

/**
 * Class Post
 * @package Vendor\Contact\Controller\Index
 */
class Post extends \Magento\Contact\Controller\Index implements HttpPostActionInterface
{
    /**
     * @var DataPersistorInterface
     */
    private $dataPersistor;

    /**
     * @var Context
     */
    private $context;

    /**
     * @var ContactManagerInterface
     */
    private $_contactManager;
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Post constructor.
     *
     * @param Context $context
     * @param ConfigInterface $contactsConfig
     * @param DataPersistorInterface $dataPersistor
     * @param ContactManagerInterface $contactManager
     * @param LoggerInterface|null $logger
     */
    public function __construct(
        Context $context,
        ConfigInterface $contactsConfig,
        DataPersistorInterface $dataPersistor,
        ContactManagerInterface $contactManager,
        LoggerInterface $logger = null
    ) {
        parent::__construct($context, $contactsConfig);
        $this->context = $context;
        $this->dataPersistor = $dataPersistor;
        $this->_contactManager = $contactManager;
        $this->logger = $logger ?: ObjectManager::getInstance()->get(LoggerInterface::class);
    }

    /**
     * Post user question
     *
     * @return Redirect
     */
    public function execute()
    {
        if (!$this->getRequest()->isPost()) {
            return $this->resultRedirectFactory->create()->setPath('*/*/');
        }
        try {
            $this->_contactManager->saveContact($this->validatedParams());
            $this->messageManager->addSuccessMessage(
                __('Thanks for contacting us with your comments and questions. We\'ll respond to you very soon.')
            );
            $this->dataPersistor->clear('contact_us');
        } catch (LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
            $this->dataPersistor->set('contact_us', $this->getRequest()->getParams());
        } catch (\Exception $e) {
            $this->logger->critical($e);
            $this->messageManager->addErrorMessage(
                __('An error occurred while processing your form. Please try again later.')
            );
            $this->dataPersistor->set('contact_us', $this->getRequest()->getParams());
        }
        return $this->resultRedirectFactory->create()->setPath('contact/index');
    }

    /**
     * @return array
     *
     * @throws \Exception
     */
    private function validatedParams()
    {
        $request = $this->getRequest();
        if (trim($request->getParam('name')) === '') {
            throw new LocalizedException(__('Enter the Name and try again.'));
        }
        if (trim($request->getParam('comment')) === '') {
            throw new LocalizedException(__('Enter the comment and try again.'));
        }
        if (false === \strpos($request->getParam('email'), '@')) {
            throw new LocalizedException(__('The email address is invalid. Verify the email address and try again.'));
        }
        if (trim($request->getParam('hideit')) !== '') {
            throw new \Exception();
        }

        return $request->getParams();
    }
}
