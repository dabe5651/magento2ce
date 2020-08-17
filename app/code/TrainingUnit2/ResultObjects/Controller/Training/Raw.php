<?php
/**
 * Copyright (c) Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace TrainingUnit2\ResultObjects\Controller\Training;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\RawFactory;

/**
 * Class Raw
 *
 * @package TrainingUnit2\ResultObjects\Controller\Action
 */
class Raw extends \Magento\Framework\App\Action\Action implements HttpGetActionInterface
{

    /**
     * @var RawFactory
     */
    private $rawFactory;

    public function __construct(
        Context $context,
        RawFactory $rawFactory
    ) {
        parent::__construct($context);
        $this->rawFactory = $rawFactory;
    }

    public function execute(): \Magento\Framework\Controller\Result\Raw
    {
        return $this->rawFactory->create()
            ->setContents('Hello World!');
    }
}
