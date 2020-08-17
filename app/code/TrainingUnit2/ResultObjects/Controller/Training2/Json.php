<?php
/**
 * Copyright (c) Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace TrainingUnit2\ResultObjects\Controller\Training2;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\JsonFactory;

/**
 * Class Json
 *
 * @package TrainingUnit2\ResultObjects\Controller\Action
 */
class Json extends \Magento\Framework\App\Action\Action implements HttpGetActionInterface
{

    /**
     * @var JsonFactory
     */
    private $jsonFactory;

    public function __construct(Context $context, JsonFactory $jsonFactory)
    {
        parent::__construct($context);
        $this->jsonFactory = $jsonFactory;
    }

    public function execute(): \Magento\Framework\Controller\Result\Json
    {
        return $this->jsonFactory->create()
            ->setData(['hello' => 'world2']);
    }
}
