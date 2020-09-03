<?php


namespace TrainingUnit4\DatabaseAdd\Controller\Training;


use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use TrainingUnit4\DatabaseAdd\Model\ResourceModel\Pet;
use TrainingUnit4\DatabaseAdd\Model\PetFactory;

class Save extends \Magento\Framework\App\Action\Action implements HttpGetActionInterface
{
    /**
     * @var JsonFactory
     */
    private $jsonFactory;
    /**
     * @var Context
     */
    private $context;
    /**
     * @var PetFactory
     */
    private $petFactory;
    /**
     * @var Pet
     */
    private $petResource;

    public function __construct(
        Context $context,
        JsonFactory $jsonFactory,
        Pet $petResource,
        PetFactory $petFactory
    ) {
        parent::__construct($context);
        $this->jsonFactory = $jsonFactory;
        $this->petFactory = $petFactory;
        $this->petResource = $petResource;
    }

    public function execute()
    {
        $this->savePet(1, "Taco");
        return $this->jsonFactory->create()->setData([["test"]]);
    }

    public function savePet($petid, $name): \Magento\Framework\Controller\Result\Json
    {
        $pet = $this->petFactory->create();
        $this->petResource->load($pet, $petid);
        $pet->setPetName($name);
        $this->petResource->save($pet);
    }
}
