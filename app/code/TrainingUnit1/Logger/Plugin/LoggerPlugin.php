<?php

namespace TrainingUnit1\Logger\Plugin;

use Psr\Log\LoggerInterface;

class LoggerPlugin
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function afterDispatch(\Magento\Framework\App\Action\Action $subject, $result)
    {
        $this->logger->info("PLUGIN".$subject->getRequest()->getFullActionName());
        return $result;
    }
}
