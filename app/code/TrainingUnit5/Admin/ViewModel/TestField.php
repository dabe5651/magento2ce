<?php

namespace TrainingUnit5\Admin\ViewModel;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;


class TestField implements ArgumentInterface
{
    private $scopeConfig;

    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    public function getTestField(): string
    {
        return (string) $this->scopeConfig->getValue('general/unit5/test');
    }
}
