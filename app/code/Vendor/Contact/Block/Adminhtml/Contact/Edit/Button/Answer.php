<?php
namespace Vendor\Contact\Block\Adminhtml\Contact\Edit\Button;

use Vendor\Contact\Api\Data\ContactInterface;
use Vendor\Contact\Model\Contact;

/**
 * Class Answer
 * @package Vendor\Contact\Block\Adminhtml\Contact\Edit\Button
 */
class Answer extends AbstractButton
{
    /**
     * @return array
     */
    public function getButtonData()
    {
        /* @var ContactInterface $contact*/
        $contact = $this->coreRegistry->registry(Contact::REGISTRY_CODE);
        $data = [];

        if ($contact->getId() && !$contact->isAnswered()) {
            $data = [
                'label' => __('Answer'),
                'class' => 'save primary',
                'data_attribute' => [
                    'mage-init' => [
                        'button' => ['event' => 'save'],
                    ],
                ],
                'sort_order' => 40,
            ];
        }

        return $data;
    }
}