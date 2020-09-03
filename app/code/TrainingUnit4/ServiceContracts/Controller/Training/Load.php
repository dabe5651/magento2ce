<?php

namespace TrainingUnit4\ServiceContracts\Controller\Training;

use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\JsonFactory;

class Load extends Action implements HttpGetActionInterface
{
    /**
     * @var JsonFactory
     */
    private $jsonFactory;
    private $customerRepository;
    public function __construct(
        Context $context,
        JsonFactory $jsonFactory,
        CustomerRepositoryInterface $customerRepository
    ) {
        parent::__construct($context);
        $this->jsonFactory = $jsonFactory;
        $this->customerRepository = $customerRepository;
    }

    public function execute(): \Magento\Framework\Controller\Result\Json
    {
        $email = 'roni_cost@example.com';
        $customer = $this->customerRepository->get($email);
        $newName = $this->getRequest()->getParam('name', 'Pepe');
        $customer->setFirstname($newName);
        $savedCustomer = $this->customerRepository->save($customer);

        $data = ['customer', $savedCustomer->getFirstname()];

        return $this->jsonFactory->create()
            ->setData($data);
    }
}
