<?php


namespace TrainingUnit5\Admin\Controller\Adminhtml\Training;


use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory;

class Admin extends Action implements HttpGetActionInterface
{

    /**
     * @var PageFactory
     */
    private $pageFactory;

    public function __construct(Context $context, PageFactory $pageFactory)
    {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
    }

    public function execute(): \Magento\Framework\View\Result\Page
    {
        return $this->pageFactory->create();
    }

}
