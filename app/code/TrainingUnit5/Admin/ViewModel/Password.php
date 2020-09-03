<?php


namespace TrainingUnit5\Admin\ViewModel;


use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Encryption\EncryptorInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class Password implements ArgumentInterface
{
    private $scopeConfig;
    /**
     * @var EncryptorInterface
     */
    private $encryptor;

    public function __construct(ScopeConfigInterface $scopeConfig, EncryptorInterface $encryptor)
    {
        $this->scopeConfig = $scopeConfig;
        $this->encryptor = $encryptor;
    }

    public function getPassword()
    {
        $password = $this->scopeConfig->getValue('general/unit5/password');
        return $this->encryptor->decrypt($password);
    }
}
