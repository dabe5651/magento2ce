<?php

namespace TrainingUnit3\LayoutEx\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class MyModel implements ArgumentInterface
{
    public function getHelloView()
    {
        return "Hello from view model!";
    }
}
