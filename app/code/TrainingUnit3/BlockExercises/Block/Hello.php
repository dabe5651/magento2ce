<?php

namespace TrainingUnit3\BlockExercises\Block;

use Magento\Framework\View\Element\Template;

class Hello extends \Magento\Framework\View\Element\Template
{
    public function __construct(Template\Context $context, array $data = [])
    {
        parent::__construct($context, $data);
        $this->setTemplate('TrainingUnit3_BlockExercises::sayhello.phtml');
    }

    public function sayHello()
    {
        return 'Hello World';
    }
}
