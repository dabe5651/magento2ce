<?php

namespace TrainingUnit3\BlockExercises\Controller\Training;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\RawFactory;
use Magento\Framework\View\LayoutInterface;

class World extends Action implements HttpGetActionInterface
{
    private $rawFactory;
    private $layout;

    public function __construct(
        Context $context,
        RawFactory $rawFactory,
        LayoutInterface $layout
    ) {
        parent::__construct($context);
        $this->context = $context;
        $this->rawFactory = $rawFactory;
        $this->layout = $layout;
    }

    public function execute(): \Magento\Framework\Controller\Result\Raw
    {
        $block = $this->layout->createBlock(
            \TrainingUnit3\BlockExercises\Block\Hello::class,
            'trainingunit3_sayhello_block'
        );
        return $this->rawFactory->create()->setContents($block->toHtml());
    }
}
