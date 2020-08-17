<?php
/**
 * Copyright (c) Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace TrainingUnit2\ResultObjects\Controller\Training;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\ForwardFactory;

/**
 * Class Forward
 *
 * @package TrainingUnit2\ResultObjects\Controller\Action
 */
class Forward extends \Magento\Framework\App\Action\Action implements HttpGetActionInterface
{

    /**
     * @var ForwardFactory
     */
    private $forwardFactory;

    public function __construct(Context $context, ForwardFactory $forwardFactory)
    {
        parent::__construct($context);
        $this->forwardFactory = $forwardFactory;
    }

    public function execute(): \Magento\Framework\Controller\Result\Forward
    {
        return $this->forwardFactory->create()
            //->setModule('') // if you want to forward to another module
            ->setController('training2')  // if you want to forward to another action path
            ->forward('json');
    }
}
