<?php

namespace TrainingUnit4\DatabaseAdd\Controller\Training;

use Dotdigitalgroup\Email\Model\Newsletter\SubscriberFactory;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use TrainingUnit4\DatabaseAdd\Model\ResourceModel\Pet\Collection;

class Json extends \Magento\Framework\App\Action\Action implements HttpGetActionInterface
{

    /**
     * @var JsonFactory
     */
    private $jsonFactory;
    /**
     * @var Context
     */
    private $context;
    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    public function __construct(
        Context $context,
        JsonFactory $jsonFactory,
        Collection $collectionFactory
    ) {
        parent::__construct($context);
        $this->jsonFactory = $jsonFactory;
        $this->collectionFactory = $collectionFactory;
    }

    public function execute(): \Magento\Framework\Controller\Result\Json
    {
        $pets = $this->collectionFactory()->create();
        $data =[];
        $pets->addFieldToFilter('pet_type', ['like' => '%dog%']);
        foreach ($pets as $item) {
            $data[] = $pets->getData();
        }
        return $this->jsonFactory->create()->setData($data);
    }
}
