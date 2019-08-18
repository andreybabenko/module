<?php
namespace Vendor\Contact\Block\Adminhtml\Contact\Edit\Button;

/**
 * Class Back
 * @package Vendor\Contact\Block\Adminhtml\Contact\Edit\Button
 */
class Back extends AbstractButton
{
    /**
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Back'),
            'on_click' => sprintf("location.href = '%s';", $this->urlBuilder->getUrl('*/*/')),
            'class' => 'back',
            'sort_order' => 10
        ];
    }
}
