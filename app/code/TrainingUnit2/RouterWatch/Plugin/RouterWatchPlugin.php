<?php

namespace TrainingUnit2\RouterWatch\Plugin;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\RouterListInterface;
use Psr\Log\LoggerInterface;

class RouterWatchPlugin
{
    private $logger;
    /**
     * @var RouterListInterface
     */
    private $routerList;

    public function __construct(LoggerInterface $logger, RouterListInterface $routerList)
    {
        $this->logger = $logger;
        $this->routerList = $routerList;
    }

    public function afterDispatch(Action $subject, $result)
    {
        foreach ($this->routerList as $item) {
            $this->logger->info("routerplugin" . get_class($item));
        }
        return $result;
    }
}
