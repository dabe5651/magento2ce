<?php

namespace TrainingUnit3\BlockExercises\Controller\Training;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\LayoutInterface;
use Magento\Framework\Controller\Result\RawFactory;

class Raw extends Action implements HttpGetActionInterface
{

    /**
     * @var RawFactory
     */
    private $rawFactory;
    /**
     * @var LayoutInterface
     */
    private $layout;

    public function __construct(
        Context $context,
        RawFactory $rawFactory,
        LayoutInterface $layout
    ) {
        parent::__construct($context);
        $this->rawFactory = $rawFactory;
        $this->layout = $layout;
    }

    /**
     * @return \Magento\Framework\Controller\Result\Raw
     */
    public function execute(): \Magento\Framework\Controller\Result\Raw
    {
        /** @var  $block  */
        $block = $this->layout->createBlock(
            \Magento\Framework\View\Element\Text::class,
            'trainingunit3_hello_text_block'
        );
        $block->setText('Hello World');
        return $this->rawFactory->create()->setContents($block->toHtml());
    }
}
