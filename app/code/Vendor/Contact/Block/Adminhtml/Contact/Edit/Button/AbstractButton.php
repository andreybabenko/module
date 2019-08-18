<?php
namespace Vendor\Contact\Block\Adminhtml\Contact\Edit\Button;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class AbstractButton
 * @package Vendor\Contact\Block\Adminhtml\Contact\Edit\Button
 */
abstract class AbstractButton implements ButtonProviderInterface
{
    /**
     * @var \Magento\Framework\UrlInterface
     */
    protected $urlBuilder;

    /**
     * @var \Magento\Framework\Registry
     */
    protected $coreRegistry;

    /**
     * AbstractButton constructor.
     *
     * @param \Magento\Framework\UrlInterface $url
     * @param \Magento\Framework\Registry $coreRegistry
     */
    public function __construct(
        \Magento\Framework\UrlInterface $url,
        \Magento\Framework\Registry $coreRegistry
    )
    {
        $this->urlBuilder = $url;
        $this->coreRegistry = $coreRegistry;
    }

    /**
     * @return array
     */
    abstract function getButtonData();
}