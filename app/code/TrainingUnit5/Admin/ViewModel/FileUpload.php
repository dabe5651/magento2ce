<?php


namespace TrainingUnit5\Admin\ViewModel;


use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Store\Model\StoresConfig;

class FileUpload implements ArgumentInterface
{
    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;
    /**
     * @var StoresConfig
     */
    private $storesConfig;

    public function __construct(ScopeConfigInterface $scopeConfig, StoresConfig $storesConfig)
    {
        $this->scopeConfig = $scopeConfig;
        $this->storesConfig = $storesConfig;
    }

    public function getAllFiles(): array
    {
        return $this->storesConfig->getStoresConfigByPath('general/unit5/file_upload');
    }
}
