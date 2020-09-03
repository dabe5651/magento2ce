<?php

namespace TrainingUnit6\LoyalCustomer\Observer;

use Magento\Customer\Model\CustomerFactory;
use Magento\Customer\Model\ResourceModel\Customer as CustomerResource;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Sales\Api\OrderRepositoryInterface;

class UpdateLoyalCustomer implements ObserverInterface
{
    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;
    /**
     * @var OrderRepositoryInterface
     */
    private $orderRepository;
    /**
     * @var CustomerFactory
     */
    private $customerFactory;
    /**
     * @var CustomerResource
     */
    private $customerResource;

    public function __construct(
        SearchCriteriaBuilder $searchCriteriaBuilder,
        OrderRepositoryInterface $orderRepository,
        CustomerFactory $customerFactory,
        CustomerResource $customerResource
    ) {
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->orderRepository = $orderRepository;
        $this->customerFactory = $customerFactory;
        $this->customerResource = $customerResource;
    }

    public function execute(Observer $observer)
    {
        /** @var \Magento\Sales\Api\Data\OrderInterface $order */
        $order = $observer->getEvent()->getData('order');

        $customerId = $order->getCustomerId();
        if ($customerId) {
            $searchCriteria = $this->searchCriteriaBuilder->addFilter('customer_id', $customerId)->create();
            $orders = $this->orderRepository->getList($searchCriteria);
            if($orders->getTotalCount() > 1) {
                $customer = $this->customerFactory->create();
                $this->customerResource->load($customer, $customerId);
                $customer->setData('is_loyal', true);
                $this->customerResource->save($customer);

            }
        }
    }
}
