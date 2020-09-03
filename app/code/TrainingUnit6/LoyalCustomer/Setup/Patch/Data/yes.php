<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace TrainingUnit6\LoyalCustomer\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

/**
* Patch is mechanism, that allows to do atomic upgrade data changes
*/
class yes implements DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface $moduleDataSetup
     */
    private $moduleDataSetup;
    /**
     * @var \Magento\Eav\Setup\EavSetup
     */
    private $eavSetup;
    /**
     * @var \Magento\Eav\Model\Config
     */
    private $eavConfig;
    /**
     * @var \Magento\Customer\Model\ResourceModel\Customer
     */
    private $customerResouce;

    /**
     * @param ModuleDataSetupInterface $moduleDataSetup
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        \Magento\Eav\Setup\EavSetupFactory $eavSetupFactory,
        \Magento\Eav\Model\Config $eavConfig,
        \Magento\Customer\Model\ResourceModel\Attribute $customerResouce
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->eavSetup = $eavSetupFactory->create(['setup' => $moduleDataSetup]);
        $this->eavConfig = $eavConfig;
        $this->customerResouce = $customerResouce;
    }

    /**
     * Do Upgrade
     *
     * @return void
     */
    public function apply()
    {
        $attributeCode = 'is_loyal';
        $this->eavSetup->addAttribute(
            \Magento\Customer\Model\Customer::ENTITY,
            $attributeCode,
            [
                'type' => 'int',
                'label' => 'Is Loyal',
                'input' => 'select',
                'required' => false,
                'default' => 0,
                'source' => \Magento\Eav\Model\Entity\Attribute\Source\Boolean::class,
                'system' => false,
                'user_defined' => true,
                'group' => 'General',
            ]
        );

        $attribute = $this->eavConfig->getAttribute(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
        $attribute->setData('used_in_forms', ['adminhtml_customer']);
        $this->customerResouce->save($attribute);
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [

        ];
    }
}
