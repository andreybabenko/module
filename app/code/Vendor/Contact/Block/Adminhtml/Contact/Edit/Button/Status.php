<?php
namespace Vendor\Contact\Block\Adminhtml\Contact\Edit\Button;

use Vendor\Contact\Api\Data\ContactInterface;
use Vendor\Contact\Model\Contact;

/**
 * Class Status
 * @package Vendor\Contact\Block\Adminhtml\Contact\Edit\Button
 */
class Status extends AbstractButton
{
    /**
     * @return array
     */
    public function getButtonData()
    {
        /* @var ContactInterface $contact*/
        $contact = $this->coreRegistry->registry(Contact::REGISTRY_CODE);
        $label = $contact->isAnswered() ? 'Set as not answered' : 'Set as answered';

        return [
            'label' => __($label),
            'on_click' => sprintf("location.href = '%s';", $this->urlBuilder->getUrl('*/*/changeStatus', [
                'id' => $contact->getId(),
                'status' => $contact->isAnswered() ? ContactInterface::STATUS_NOT_ANSWERED : ContactInterface::STATUS_ANSWERED
            ])),
            'sort_order' => 30
        ];
    }
}