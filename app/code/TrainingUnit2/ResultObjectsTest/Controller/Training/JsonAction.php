<?php

namespace TrainingUnit2\ResultObjectsTest\Controller\Training;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;

class JsonAction extends Action
{
    /**
     * @var JsonFactory
     */
    protected $jsonFactory;
    /**
     * @var Context
     */
    protected $context;

    public function __construct(
        Context $context,
        JsonFactory $jsonFactory
    ) {
        parent::__construct($context);
        $this->jsonFactory = $jsonFactory;
        $this->context = $context;
    }

    public function execute()
    {
        return $this->jsonFactory->create()->setData(["hello", "world"]);
    }
}
