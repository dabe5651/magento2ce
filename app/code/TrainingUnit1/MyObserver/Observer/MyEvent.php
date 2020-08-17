<?php

namespace TrainingUnit1\MyObserver\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

class MyEvent implements ObserverInterface
{
    private $logger;
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
    public function execute(Observer $observer)
    {
        $request = $observer->getEvent()->getRequest();
        $this->logger->info("OBS" . $request->getFullActionName());
    }
}
