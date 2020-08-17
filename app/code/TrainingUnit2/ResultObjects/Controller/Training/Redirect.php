<?php
/**
 * Copyright (c) Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace TrainingUnit2\ResultObjects\Controller\Training;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\RedirectFactory;

/**
 * Class Redirect
 *
 * @package TrainingUnit2\ResultObjects\Controller\Action
 */
class Redirect extends \Magento\Framework\App\Action\Action implements HttpGetActionInterface
{

    /**
     * @var RedirectFactory
     */
    private $redirectResultFactory;

    public function __construct(Context $context, RedirectFactory $redirectResultFactory)
    {
        parent::__construct($context);
        $this->redirectResultFactory = $redirectResultFactory;
    }

    public function execute(): \Magento\Framework\Controller\Result\Redirect
    {
        return $this->redirectResultFactory->create()->setPath('*/*/raw');
        // can use URL
        // return $this->redirectResultFactory->create()->setUrl('http://www.example.com/result_objects/training/raw');
    }
}
