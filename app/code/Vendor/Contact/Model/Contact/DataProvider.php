<?php
namespace Vendor\Contact\Model\Contact;

use Vendor\Contact\Model\ResourceModel\Contact\CollectionFactory;

/**
 * Class DataProvider
 * @package Vendor\Contact\Model\Contact
 */
class DataProvider  extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @var array
     */
    protected $loadedData;

    /**
     * DataProvider constructor.
     *
     * @param $name
     * @param $primaryFieldName
     * @param $requestFieldName
     * @param CollectionFactory $collectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        string $name,
        string $primaryFieldName,
        string $requestFieldName,
        CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    )
    {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);

        $this->collection = $collectionFactory->create();
    }

    /**
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $items = $this->collection->getItems();
        $this->loadedData = [];

        foreach ($items as $contact) {
            $this->loadedData[$contact->getId()] = $contact->getData();
        }

        return $this->loadedData;
    }
}