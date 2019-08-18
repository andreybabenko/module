<?php
namespace Vendor\Contact\Block\Adminhtml\Contact\Edit\Button;

use Vendor\Contact\Api\Data\ContactInterface;
use Vendor\Contact\Model\Contact;

/**
 * Class Delete
 * @package Vendor\Contact\Block\Adminhtml\Contact\Edit\Button
 */
class Delete extends AbstractButton
{
    /**
     * @return array
     */
    public function getButtonData()
    {
        $data = [];
        /* @var ContactInterface $contact*/
        $contact = $this->coreRegistry->registry(Contact::REGISTRY_CODE);

        if ($contact->getId()) {
            $data = [
                'label' => __('Delete'),
                'class' => 'delete',
                'on_click' => 'deleteConfirm(\'' . __(
                        'Are you sure you want to do this?'
                    ) . '\', \'' . $this->urlBuilder->getUrl('*/*/delete', ['id' => $contact->getId()]) . '\')',
                'sort_order' => 20,
            ];
        }

        return $data;
    }
}
